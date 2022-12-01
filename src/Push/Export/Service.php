<?php

namespace Wearesho\Bobra\Ubki\Push\Export;

use GuzzleHttp;
use Psr\Http;
use Psr\Log;
use Wearesho\Bobra\Ubki\Push;
use Wearesho\Bobra\Ubki\Authorization;
use Wearesho\Bobra\Ubki\RequestResponsePair;
use Wearesho\Bobra\Ubki\SendService;
use Wearesho\Bobra\Ubki\RequestInterface;

/**
 * Class Service
 * @package Wearesho\Bobra\Ubki\Push\Export
 */
class Service extends SendService
{
    /** @var ConverterInterface */
    protected $converter;

    public function __construct(
        Push\ConfigInterface $config,
        Authorization\ProviderInterface $authProvider,
        GuzzleHttp\ClientInterface $client,
        Log\LoggerInterface $logger = null,
        ConverterInterface $converter = null
    ) {
        $this->converter = $converter ?? new Converter();

        parent::__construct($config, $authProvider, $client, $logger);
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
        /** @var \Wearesho\Bobra\Ubki\Push\Export\RequestInterface $request */
        $body = $this->converter->dataDocumentToXml(
            $request->getHead(),
            $request->getBody(),
            $this->authProvider->provide($this->config)->getSessionId()
        )->saveXML();

        $post = $this->httpPost($this->config->getPushUrl(), base64_encode($body));

        $this->log("UBKI export request {url}", [
            'url' => $post->getUri()->__toString(),
        ]);

        try {
            $response = $this->client->send($post);
        } catch (GuzzleHttp\Exception\RequestException $exception) {
            throw new RequestException($request, $exception->getMessage(), $exception->getCode(), $exception);
        }

        return new RequestResponsePair(
            $body,
            $response->getBody()->__toString()
        );
    }
}
