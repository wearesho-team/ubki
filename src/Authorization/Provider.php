<?php

namespace Wearesho\Bobra\Ubki\Authorization;

use Carbon\Carbon;

use GuzzleHttp;

use Psr\Http\Message\ResponseInterface;
use Psr\Log;

/**
 * Class Client
 * @package Wearesho\Bobra\Ubki\Authorization
 */
class Provider implements ProviderInterface
{
    /** @var GuzzleHttp\ClientInterface */
    protected $client;

    /** @var Log\LoggerInterface */
    protected $logger;

    public function __construct(
        GuzzleHttp\ClientInterface $client,
        Log\LoggerInterface $logger = null
    ) {
        $this->client = $client;
        $this->logger = $logger ?? new Log\NullLogger();
    }

    /**
     * @param ConfigInterface $config
     *
     * @return Response
     * @throws Exception
     * @throws GuzzleHttp\Exception\GuzzleException
     */
    public function provide(ConfigInterface $config): Response
    {
        $request = $this->getRequest($config);

        $this->logger->debug("UBKI Authorization Request", [
            'url' => $request->getUri()->__toString(),
        ]);

        $httpResponse = $this->client->send($request);
        $this->validateResponse($httpResponse);

        /** @var GuzzleHttp\Psr7\Response $httpResponse */

        $xml = simplexml_load_string($httpResponse->getBody()->__toString());
        $attributes = $xml->auth->attributes();

        $context = ((array)$attributes)["@attributes"];
        $context['sessid'] = preg_replace(
            '/^(.{4}).+(.{4})$/',
            '$1****$2',
            $context['sessid']
        );

        $this->logger->info("UBKI Authorization Response", $context);

        $response = new Response(
            (string)$attributes->sessid,
            Carbon::createFromFormat('d.m.Y G:i', (string)$attributes->datecr),
            Carbon::createFromFormat('d.m.Y G:i', (string)$attributes->dateed),
            (string)$attributes->userlogin,
            (int)$attributes->userid,
            (string)$attributes->userlname,
            (string)$attributes->userfname,
            (string)$attributes->usermname,
            (int)$attributes->rolegroupid,
            (string)$attributes->rolegroupname,
            (int)$attributes->agrid,
            (string)$attributes->agrname
        );

        return $response;
    }

    /**
     * @param ResponseInterface $response
     * @throws GuzzleHttp\Exception\RequestException
     * @throws Exception
     */
    protected function validateResponse(ResponseInterface $response): void
    {
        $xml = simplexml_load_string($response->getBody()->__toString());
        if ($xml === false || !isset($xml->auth)) {
            // Not XML or invalid format XML
            throw new Exception('Invalid response body format.', Exception::CODE_UNKNOWN_ERROR);
        }

        $attributes = $xml->auth->attributes();
        if (!isset($attributes->errcode) || !isset($attributes->errtext)) {
            // Invalid format XMl
            throw new Exception('Invalid xml doc structure', Exception::CODE_UNKNOWN_ERROR);
        }

        throw new Exception(
            (string)$attributes->errtext,
            (int)$attributes->errcode,
            null,
            isset($attributes->errtextclient) ? (string)$attributes->errtextclient : null
        );
    }

    private function getRequest(ConfigInterface $config): GuzzleHttp\Psr7\Request
    {
        return new GuzzleHttp\Psr7\Request(
            $method = 'post',
            $config->getAuthUrl(),
            [],
            base64_encode($this->getBody($config))
        );
    }

    private function getBody(ConfigInterface $config): string
    {
        $xml = new \DOMDocument('1.0', 'utf-8');

        $xmlRoot = $xml->createElement('doc');
        $xmlRoot = $xml->appendChild($xmlRoot);

        $authElm = $xml->createElement('auth');
        $authElm = $xmlRoot->appendChild($authElm);

        $loginAttr = $xml->createAttribute('login');
        $loginAttr->value = $config->getUsername();

        $passwordAttr = $xml->createAttribute('pass');
        $passwordAttr->value = $config->getPassword();

        $authElm->appendChild($loginAttr);
        $authElm->appendChild($passwordAttr);

        return $xml->saveXML();
    }
}
