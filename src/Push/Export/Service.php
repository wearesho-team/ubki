<?php

namespace Wearesho\Bobra\Ubki\Push\Export;

use GuzzleHttp;
use Psr\Http;
use Psr\Log;
use Wearesho\Bobra\Ubki;

/**
 * Class Service
 * @package Wearesho\Bobra\Ubki\Push\Export
 *
 * @method Ubki\Push\ConfigInterface config();
 */
class Service extends Ubki\Infrastructure\Service implements ServiceInterface
{
    /** @var FormerInterface */
    protected $former;

    public function __construct(
        Ubki\Push\ConfigInterface $config,
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
    public function export(RequestInterface $request): Ubki\RequestResponsePair
    {
        return $this->send($this->config()->getPushUrl(), $request);
    }
}
