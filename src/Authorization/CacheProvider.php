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
    protected Psr\SimpleCache\CacheInterface $cache;

    protected array $responses = [];

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
        if (array_key_exists($cacheKey, $this->responses)) {
            return $this->responses[$cacheKey];
        }
        if (($cache = $this->cache->get($cacheKey)) instanceof Response) {
            return $this->responses[$cacheKey] = $cache;
        }

        $this->responses[$cacheKey] = $response = parent::provide($config);

        /** @noinspection PhpUnhandledExceptionInspection */
        $isCacheSet = $this->cache->set(
            $cacheKey,
            $response,
            $response->getCreatedAt()->endOfDay()->diff(Carbon::now(), true)
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
        return "ubki.authorization."
            . sha1($config->getAuthUrl() . $config->getUsername() . $config->getPassword());
    }
}
