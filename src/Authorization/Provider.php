<?php

declare(strict_types=1);

namespace Wearesho\Bobra\Ubki\Authorization;

use Carbon\Carbon;
use GuzzleHttp;
use Psr\Log;
use Spatie\ArrayToXml\ArrayToXml;

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
        Log\LoggerInterface $logger = \null
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

        try {
            $httpResponse = $this->client->send($request);
        } catch (GuzzleHttp\Exception\RequestException $exception) {
            $this->catchException($exception);
        }
        /** @var GuzzleHttp\Psr7\Response $httpResponse */

        $xml = simplexml_load_string((string)$httpResponse->getBody());
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
     * @param GuzzleHttp\Exception\RequestException $exception
     * @throws GuzzleHttp\Exception\RequestException
     * @throws Exception
     */
    protected function catchException(GuzzleHttp\Exception\RequestException $exception): void
    {
        if (\is_null($exception->getResponse())) {
            throw $exception;
        }

        $xml = \simplexml_load_string((string)$exception->getResponse()->getBody());
        if ($xml === \false || !isset($xml->auth)) {
            // Not XML or invalid format XML
            throw $exception;
        }

        $attributes = $xml->auth->attributes();
        if (!isset($attributes->errcode) || !isset($attributes->errtext)) {
            // Invalid format XMl
            throw $exception;
        }

        throw new Exception(
            (string)$attributes->errtext,
            (int)$attributes->errcode,
            $exception,
            isset($attributes->errtextclient) ? (string)$attributes->errtextclient : \null
        );
    }

    private function getRequest(ConfigInterface $config): GuzzleHttp\Psr7\Request
    {
        return new GuzzleHttp\Psr7\Request(
            'post',
            $config->getAuthUrl(),
            [],
            \base64_encode($this->getBody($config))
        );
    }

    private function getBody(ConfigInterface $config): string
    {
        $params = [
            'auth' => [
                '_attributes' => [
                    'login' => $config->getUsername(),
                    'pass' => $config->getPassword()
                ],
            ]
        ];

        return ArrayToXml::convert($params, 'doc', \true, 'utf-8');
    }
}
