<?php

namespace Wearesho\Bobra\Ubki;

use GuzzleHttp;
use Psr\Log;

/**
 * Class SendService
 * @package Wearesho\Bobra\Ubki
 */
abstract class SendService implements SendServiceInterface
{
    /** @var Push\ConfigInterface */
    protected $config;

    /** @var GuzzleHttp\ClientInterface */
    protected $client;

    /** @var Authorization\ProviderInterface */
    protected $authProvider;

    /** @var Log\LoggerInterface */
    protected $logger;

    public function __construct(
        Push\ConfigInterface $config,
        Authorization\ProviderInterface $authProvider,
        GuzzleHttp\ClientInterface $client,
        Log\LoggerInterface $logger = null
    ) {
        $this->config = $config;
        $this->authProvider = $authProvider;
        $this->client = $client;
        $this->logger = $logger ?? new Log\NullLogger();
    }

    abstract public function send(RequestInterface $request): RequestResponsePair;

    public function config(): Push\ConfigInterface
    {
        return $this->config;
    }

    protected function httpPost(string $url, string $body, array $headers = []): GuzzleHttp\Psr7\Request
    {
        return new GuzzleHttp\Psr7\Request('POST', $url, $headers, $body);
    }

    protected function log(string $message, array $args): void
    {
        $this->logger->debug($message, $args);
    }
}
