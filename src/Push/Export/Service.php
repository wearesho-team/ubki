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
class Service extends Ubki\Service implements ServiceInterface
{
    use ServiceTrait;

    public function __construct(
        Ubki\Push\ConfigInterface $config,
        Ubki\Authorization\ProviderInterface $authProvider,
        GuzzleHttp\ClientInterface $client,
        Log\LoggerInterface $logger = null,
        FormerInterface $former = null
    ) {
        parent::__construct($config, $authProvider, $client, $former ?? new Former(), $logger);
    }
}
