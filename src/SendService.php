<?php

namespace Wearesho\Bobra\Ubki;

use GuzzleHttp;

use Psr\Http\Message\ResponseInterface;
use Psr\Log\LoggerInterface;

/**
 * Class SendService
 * @package Wearesho\Bobra\Ubki
 */
abstract class SendService
{
    /** @var GuzzleHttp\ClientInterface */
    protected $client;

    /** @var LoggerInterface */
    protected $logger;

    /** @var string */
    protected $logMessage;

    /** @var GuzzleHttp\Psr7\Request|null */
    private $request;

    public function getRequest(): ?GuzzleHttp\Psr7\Request
    {
        return $this->request;
    }

    /**
     * @param string $url
     * @param string $body
     * @param array  $headers
     *
     * @return \Psr\Http\Message\ResponseInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    protected function post(string $url, string $body, array $headers = []): ResponseInterface
    {
        $this->request = new GuzzleHttp\Psr7\Request('POST', $url, $headers, $body);

        $this->logger->debug($this->logMessage . "\nUrl: {url}", [
            'url' => $this->request->getUri()->__toString(),
        ]);

        return $this->client->send($this->request);
    }
}
