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
        FormerInterface $former = null
    ) {
        $this->former = $former ?? new Former();

        parent::__construct($config, $authProvider, $client, $logger);
    }

    /**
     * @param RequestInterface $request
     *
     * @return Ubki\RequestResponsePair
     * @throws FormerException
     * @throws GuzzleHttp\Exception\GuzzleException
     * @throws RequestException
     */
    public function export(RequestInterface $request): Ubki\RequestResponsePair
    {
        $body = $this->former->form($request);

        $this->log("UBKI export request {url}", [
            'url' => $this->config->getPushUrl(),
        ]);

        try {
            $response = $this->send($this->config->getPushUrl(), $body);
        } catch (\Throwable $exception) {
            throw new RequestException($request, $exception->getMessage(), $exception->getCode(), $exception);
        }

        return new Ubki\RequestResponsePair($body, (string)$response->getBody());
    }
}
