<?php

namespace Wearesho\Bobra\Ubki\Push\Export;

use GuzzleHttp;
use Psr\Http;
use Psr\Log;
use Wearesho\Bobra\Ubki;

/**
 * Class Service
 * @package Wearesho\Bobra\Ubki\Push\Export
 */
class Service extends Ubki\Infrastructure\Service
{
    /** @var Ubki\Push\ConfigInterface */
    protected $config;

    /** @var FormerInterface */
    protected $former;

    public function __construct(
        Ubki\Push\ConfigInterface $config,
        Ubki\Authorization\ProviderInterface $authProvider,
        GuzzleHttp\ClientInterface $client,
        Log\LoggerInterface $logger = null,
        FormerInterface $converter = null
    ) {
        $this->former = $converter ?? new Former();

        parent::__construct($config, $authProvider, $client, $logger);
    }

    /**
     * @param Ubki\Infrastructure\RequestInterface $request
     *
     * @return Ubki\RequestResponsePair
     * @throws RequestException
     * @throws GuzzleHttp\Exception\GuzzleException
     */
    public function send(Ubki\Infrastructure\RequestInterface $request): Ubki\RequestResponsePair
    {
        /** @var \Wearesho\Bobra\Ubki\Push\Export\RequestInterface $request */
        $body = $this->former->dataDocumentToXml(
            $request->getHead(),
            $request->getBody(),
            $this->authProvider->provide($this->config)->getSessionId()
        )->saveXML();


        $this->log("UBKI export request {url}", [
            'url' => $this->config->getPushUrl(),
        ]);

        try {
            $response = $this->post($this->config->getPushUrl(), base64_encode($body));
        } catch (GuzzleHttp\Exception\RequestException $exception) {
            throw new RequestException($request, $exception->getMessage(), $exception->getCode(), $exception);
        }

        return new Ubki\RequestResponsePair($body, (string)$response->getBody());
    }
}
