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
    use ServiceTrait;

    public function __construct(
        ConfigInterface $config,
        Ubki\Authorization\ProviderInterface $authProvider,
        GuzzleHttp\ClientInterface $client,
        Log\LoggerInterface $logger = null,
        FormerInterface $former = null
    ) {
        parent::__construct($config, $authProvider, $client, $former ?? new Former(), $logger);
    }
}
