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

    public function __construct(
        ConfigInterface $config,
        Ubki\Authorization\ProviderInterface $authProvider,
        GuzzleHttp\ClientInterface $client,
        Log\LoggerInterface $logger = null,
        FormerInterface $former = null
    ) {
        parent::__construct($config, $authProvider, $client, $former ?? new Former(), $logger);
    }

    /**
     * @param RequestInterface $request
     *
     * @return Ubki\RequestResponsePair
     * @throws Ubki\Exception\Request
     * @throws Ubki\Exception\Former
     */
    public function import(RequestInterface $request): Ubki\RequestResponsePair
    {
        return $this->send($this->config()->getPullUrl(), $request);
    }
}
