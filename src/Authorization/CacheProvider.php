<?php

namespace Wearesho\Bobra\Ubki\Authorization;

use Carbon\Carbon;
use GuzzleHttp;
use Psr;
use Wearesho\Bobra\Ubki;

/**
 * Class CacheProvider
 * @package Wearesho\Bobra\Ubki\Authorization
 */
class CacheProvider extends Provider implements ProviderInterface
{
    /** @var Psr\SimpleCache\CacheInterface */
    protected $cache;

    public function __construct(
        Psr\SimpleCache\CacheInterface $cache,
        Ubki\ConfigInterface $config,
        GuzzleHttp\ClientInterface $client,
        Psr\Log\LoggerInterface $logger = null
    ) {
        $this->cache = $cache;
        parent::__construct($config, $client, $logger);
    }

    public function provide(): Response
    {
        $cacheKey = $this->getCacheKey();

        /** @noinspection PhpUnhandledExceptionInspection */
        $cached = $this->cache->get($cacheKey);
        if ($cached instanceof Response) {
            return $cached;
        }

        $response = parent::provide();

        /** @noinspection PhpUnhandledExceptionInspection */
        $isCacheSet = $this->cache->set(
            $cacheKey,
            $response,
            $response->getUpdatedAt()->diff(Carbon::now())
        );

        if (!$isCacheSet) {
            $this->logger->warning("UBKI Authorization Cache Failed for key {cacheKey}", [
                'cacheKey' => $cacheKey,
            ]);
        }

        return $response;
    }

    protected function getCacheKey(): string
    {
        return "ubki.authorization." . sha1($this->config->getAuthUrl() . $this->config->getUsername());
    }
}
