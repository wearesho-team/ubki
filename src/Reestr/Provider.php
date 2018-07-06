<?php

namespace Wearesho\Bobra\Ubki\Reestr;

use Carbon\Carbon;
use GuzzleHttp;
use Psr\Log;
use Wearesho\Bobra\Ubki;

/**
 * Class Provider
 *
 * @package Wearesho\Bobra\Ubki\Reestr
 */
class Provider implements ProviderInterface
{
    /** @var Ubki\ConfigInterface */
    protected $config;

    /** @var GuzzleHttp\ClientInterface */
    protected $client;

    /** @var Ubki\Authorization\ProviderInterface */
    protected $authProvider;

    /** @var Log\LoggerInterface */
    protected $logger;

    public function __construct(
        ConfigInterface $config,
        GuzzleHttp\ClientInterface $client,
        Ubki\Authorization\ProviderInterface $authProvider,
        Log\LoggerInterface $logger = null
    ) {
        $this->config = $config;
        $this->client = $client;
        $this->authProvider = $authProvider;
        $this->logger = $logger ?? new Log\NullLogger();
    }

    /**
     * @param RequestInterface $request
     *
     * @return ResponseInterface
     * @throws GuzzleHttp\Exception\GuzzleException
     */
    public function provide(RequestInterface $request): ResponseInterface
    {
        $guzzleRequest = $this->convertToGuzzleRequest($request);

        $this->logger->debug("UBKI Reestr request {url}", [
            'url' => $guzzleRequest->getUri()->__toString(),
        ]);

        /** @var GuzzleHttp\Psr7\Response $httpResponse */
        $httpResponse = $this->client->send($guzzleRequest);
        $responseBody = $httpResponse->getBody()->__toString();

        if (!$this->config->isTestMode()) {
            $fileUrl = $responseBody;
            $responseBody = $this->getFile($fileUrl)->getBody()->__toString();
        }

        $xml = simplexml_load_string($responseBody);
        $attributes = $xml->prot->attributes();

        $context = ((array)$attributes)["@attributes"];
        $requestType = $request->getTodo();

        switch ($requestType) {
            case Request::TYPE_REP:
                return new Rep\Response(
                    $requestType,
                    Carbon::createFromFormat('Ymd', $context->indate),
                    (string)$context->idout,
                    (string)$context->idalien,
                    (string)$context->sessid,
                    (string)$context->state,
                    (string)$context->oper,
                    (int)$context->compid,
                    (string)$context->item,
                    (string)$context->ertype,
                    (string)$context->crytical,
                    (int)$context->inn,
                    (string)$context->remark
                );
            case Request::TYPE_BIL:
                // TODO: need implement Bil request
                break;
        }
    }

    private function convertToGuzzleRequest(RequestInterface $request): GuzzleHttp\Psr7\Request
    {
        return new GuzzleHttp\Psr7\Request(
            $method = 'post',
            $this->config->getReestrUrl(),
            [],
            base64_encode(
                $request->getBody(
                    $this->authProvider
                        ->provide()
                        ->getSessionId()
                )
            )
        );
    }

    /**
     * @param string $url
     *
     * @return GuzzleHttp\Psr7\Response
     * @throws GuzzleHttp\Exception\GuzzleException
     */
    private function getFile(string $url): GuzzleHttp\Psr7\Response
    {
        /** @var GuzzleHttp\Psr7\Response $response */
        $response = $this->client->send(
            new GuzzleHttp\Psr7\Request(
                $method = 'get',
                $url,
                []
            )
        );

        return $response;
    }
}
