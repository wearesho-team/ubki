<?php

namespace Wearesho\Bobra\Ubki\Authorization;

use Carbon\Carbon;

use GuzzleHttp;

use Psr;

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
        GuzzleHttp\ClientInterface $client,
        Psr\Log\LoggerInterface $logger = null
    ) {
        $this->cache = $cache;
        parent::__construct($client, $logger);
    }

    public function provide(ConfigInterface $config): Response
    {
        $cacheKey = $this->getCacheKey($config);

        /** @noinspection PhpUnhandledExceptionInspection */
        $cached = $this->cache->get($cacheKey);
        if ($cached instanceof Response) {
            return $cached;
        }

        $response = parent::provide($config);

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

    protected function getCacheKey(ConfigInterface $config): string
    {
        return "ubki.authorization." . sha1($config->getAuthUrl() . $config->getUsername());
    }
}
