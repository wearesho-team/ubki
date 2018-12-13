<?php

namespace Wearesho\Bobra\Ubki\Push\Export;

use GuzzleHttp;
use Psr\Http;
use Psr\Log;
use Wearesho\Bobra\Ubki;
use Wearesho\Bobra\Ubki\Infrastructure\ConfigInterface;

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
        $this->former = $former ?? new Former();

        parent::__construct($config, $authProvider, $client, $logger);
    }

    /**
     * @param RequestInterface $request
     *
     * @return Ubki\RequestResponsePair
     * @throws FormerException
     * @throws RequestException
     */
    public function export(RequestInterface $request): Ubki\RequestResponsePair
    {
        $body = $this->former
            ->form(
                $request,
                $this->authProvider()
                    ->provide($this->config())
                    ->getSessionId()
            );

        try {
            $response = $this->send($this->config()->getPushUrl(), $body);
        } catch (GuzzleHttp\Exception\GuzzleException $exception) {
            throw new RequestException($request, $exception->getMessage(), $exception->getCode(), $exception);
        }

        return new Ubki\RequestResponsePair($body, (string)$response->getBody());
    }
}
