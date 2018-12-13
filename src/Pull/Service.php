<?php

namespace Wearesho\Bobra\Ubki\Pull;

use GuzzleHttp;
use Psr\Log;
use Wearesho\Bobra\Ubki;

/**
 * Class Service
 * @package Wearesho\Bobra\Ubki\Pull
 *
 * @method ConfigInterface config();
 */
class Service extends Ubki\Infrastructure\Service implements ServiceInterface
{
    protected $logMessage = 'UBKI import request';

    /** @var FormerInterface */
    protected $former;

    public function __construct(
        ConfigInterface $config,
        Ubki\Authorization\ProviderInterface $authProvider,
        GuzzleHttp\ClientInterface $client,
        Log\LoggerInterface $logger = null,
        FormerInterface $former = null
    ) {
        parent::__construct($config, $authProvider, $client, $logger);
    }

    /**
     * @param RequestInterface $request
     *
     * @return Ubki\RequestResponsePair
     * @throws RequestException
     */
    public function import(RequestInterface $request): Ubki\RequestResponsePair
    {
        $body = $this->former
            ->form(
                $request,
                $this->authProvider()
                    ->provide($this->config())
                    ->getSessionId()
            );

        try {
            $response = $this->send(
                $this->config()->getPullUrl(),
                $body
            );
        } catch (GuzzleHttp\Exception\GuzzleException $exception) {
            throw new RequestException(
                $request,
                $exception->getMessage(),
                $exception->getCode(),
                $exception
            );
        }

        return $this->formResponse($body, $response);
    }
}
