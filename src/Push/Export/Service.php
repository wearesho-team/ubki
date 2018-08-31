<?php

namespace Wearesho\Bobra\Ubki\Push\Export;

use GuzzleHttp;

use Psr\Http;
use Psr\Log;

use Wearesho\Bobra\Ubki\Push;
use Wearesho\Bobra\Ubki\Authorization;

/**
 * Class Service
 * @package Wearesho\Bobra\Ubki\Push\Export
 */
class Service implements ServiceInterface
{
    /** @var Push\ConfigInterface */
    protected $config;

    /** @var GuzzleHttp\ClientInterface */
    protected $client;

    /** @var Authorization\ProviderInterface */
    protected $authProvider;

    /** @var ConverterInterface */
    protected $converter;

    /** @var Log\LoggerInterface */
    protected $logger;

    public function __construct(
        Push\ConfigInterface $config,
        Authorization\ProviderInterface $authProvider,
        GuzzleHttp\ClientInterface $client,
        ConverterInterface $converter = null,
        Log\LoggerInterface $logger = null
    ) {
        $this->config = $config;
        $this->authProvider = $authProvider;
        $this->client = $client;
        $this->logger = $logger ?? new Log\NullLogger();
        $this->converter = $converter ?? new Converter();
    }

    /**
     * @param DataDocumentInterface $document
     *
     * @return Response
     * @throws GuzzleHttp\Exception\GuzzleException
     * @throws GuzzleHttp\Exception\BadResponseException
     */
    public function send(DataDocumentInterface $document): Response
    {
        $body = $this->converter->dataDocumentToXml($document);

        $request = new GuzzleHttp\Psr7\Request(
            'post',
            $this->config->getPushUrl(),
            [base64_encode($body),]
        );
        $response = $this->client->send($request);

        $this->validateResult($request, $response);

        return $this->converter->xmlToResponse($response->getBody()->__toString());
    }

    /**
     * @param GuzzleHttp\Psr7\Request        $request
     * @param Http\Message\ResponseInterface $response
     *
     * @throws GuzzleHttp\Exception\BadResponseException
     */
    protected function validateResult(
        GuzzleHttp\Psr7\Request $request,
        Http\Message\ResponseInterface $response
    ): void {
        if (is_null($response)) {
            throw new GuzzleHttp\Exception\BadResponseException("Null returned", $request, $response);
        }
    }
}
