<?php

namespace Wearesho\Bobra\Ubki\Infrastructure;

use GuzzleHttp;
use Psr\Http\Message\ResponseInterface;
use Psr\Log;
use Wearesho\Bobra\Ubki;

/**
 * Class Service
 * @package Wearesho\Bobra\Ubki\Infrastructure
 */
abstract class Service implements ServiceInterface
{
    /** @var ConfigInterface */
    protected $config;

    /** @var GuzzleHttp\ClientInterface */
    protected $client;

    /** @var Ubki\Authorization\ProviderInterface */
    protected $authProvider;

    /** @var Log\LoggerInterface */
    protected $logger;

    public function __construct(
        ConfigInterface $config,
        Ubki\Authorization\ProviderInterface $authProvider,
        GuzzleHttp\ClientInterface $client,
        Log\LoggerInterface $logger = null
    ) {
        $this->config = $config;
        $this->authProvider = $authProvider;
        $this->client = $client;
        $this->logger = $logger ?? new Log\NullLogger();
    }

    abstract public function send(RequestInterface $request): Ubki\RequestResponsePair;

    public function config(): ConfigInterface
    {
        return $this->config;
    }

    public function authProvider(): Ubki\Authorization\ProviderInterface
    {
        return $this->authProvider;
    }

    public function client(): GuzzleHttp\ClientInterface
    {
        return $this->client;
    }

    /**
     * @param string $url
     * @param string $body
     * @param array $headers
     *
     * @return ResponseInterface
     * @throws GuzzleHttp\Exception\GuzzleException
     */
    protected function post(string $url, string $body, array $headers = []): ResponseInterface
    {
        return $this->client->request('POST', $url, [
            GuzzleHttp\RequestOptions::HEADERS => $headers,
            GuzzleHttp\RequestOptions::BODY => $body,
        ]);
    }

    protected function log(string $message, array $args): void
    {
        $this->logger->debug($message, $args);
    }
}
