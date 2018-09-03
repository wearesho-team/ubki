<?php

namespace Wearesho\Bobra\Ubki\Push\Export;

use GuzzleHttp;

use Psr\Http;
use Psr\Log;

use Wearesho\Bobra\Ubki\Blocks\Interfaces\RequestData;
use Wearesho\Bobra\Ubki\Push;
use Wearesho\Bobra\Ubki\Authorization;
use Wearesho\Bobra\Ubki\RequestResponsePair;

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

    /** @var Log\LoggerInterface */
    protected $logger;

    /** @var ConverterInterface */
    protected $converter;

    public function __construct(
        Push\ConfigInterface $config,
        Authorization\ProviderInterface $authProvider,
        GuzzleHttp\ClientInterface $client,
        Log\LoggerInterface $logger = null,
        ConverterInterface $converter = null
    ) {
        $this->config = $config;
        $this->authProvider = $authProvider;
        $this->client = $client;
        $this->logger = $logger ?? new Log\NullLogger();
        $this->converter = $converter ?? new Converter();
    }

    /**
     * @param RequestInterface $request
     *
     * @return RequestResponsePair
     * @throws RequestException
     * @throws GuzzleHttp\Exception\GuzzleException
     */
    public function send(RequestInterface $request): RequestResponsePair
    {
        $body = $this->converter->dataDocumentToXml(
            $request->getHead(),
            $request->getBody(),
            $this->authProvider->provide($this->config)->getSessionId()
        )->saveXML();

        $guzzleRequest = new GuzzleHttp\Psr7\Request(
            'post',
            $this->config->getPushUrl(),
            [base64_encode($body),]
        );
        $this->logger->debug("UBKI export request {url}", [
            'url' => $guzzleRequest->getUri()->__toString(),
        ]);

        try {
            $response = $this->client->send($guzzleRequest);
        } catch (GuzzleHttp\Exception\RequestException $exception) {
            throw new RequestException($request, $exception->getMessage(), $exception->getCode(), $exception);
        }

        return new RequestResponsePair(
            $body,
            $response->getBody()->__toString()
        );
    }

    public function config(): Push\ConfigInterface
    {
        return $this->config;
    }
}
