<?php

namespace Wearesho\Bobra\Ubki\Infrastructure;

use GuzzleHttp;
use Psr\Log;
use Wearesho\Bobra\Ubki;

/**
 * Class Service
 * @package Wearesho\Bobra\Ubki\Infrastructure
 */
abstract class Service implements ServiceInterface
{
    /** @var Ubki\Authorization\ConfigInterface */
    protected $config;

    /** @var GuzzleHttp\ClientInterface */
    protected $client;

    /** @var Ubki\Authorization\ProviderInterface */
    protected $authProvider;

    /** @var Log\LoggerInterface */
    protected $logger;

    /** @var FormerInterface */
    protected $former;

    public function __construct(
        Ubki\Authorization\ConfigInterface $config,
        Ubki\Authorization\ProviderInterface $authProvider,
        GuzzleHttp\ClientInterface $client,
        FormerInterface $former,
        Log\LoggerInterface $logger = null
    ) {
        $this->config = $config;
        $this->authProvider = $authProvider;
        $this->client = $client;
        $this->former = $former;
        $this->logger = $logger ?? new Log\NullLogger();
    }

    /**
     * @param string $url
     * @param RequestInterface $request
     * @param array $headers
     *
     * @return Ubki\RequestResponsePair
     * @throws Ubki\Exception\Request
     * @throws Ubki\Exception\Former
     */
    public function send(string $url, RequestInterface $request, array $headers = []): Ubki\RequestResponsePair
    {
        $body = $this->former->form(
            $request,
            $this->authProvider->provide($this->config)->getSessionId()
        );

        $this->log('UBKI service: Send request to {url}', ['url' => $url]);

        try {
            $response = $this->client
                ->request('POST', $url, [
                    GuzzleHttp\RequestOptions::HEADERS => $headers,
                    GuzzleHttp\RequestOptions::BODY => $body,
                ]);
        } catch (GuzzleHttp\Exception\GuzzleException $exception) {
            throw new Ubki\Exception\Request($request, $exception->getMessage(), $exception->getCode(), $exception);
        }

        return new Ubki\RequestResponsePair($body, $response->getBody()->__toString());
    }

    protected function log(string $message, array $args): void
    {
        $this->logger->info($message, $args);
    }
}
