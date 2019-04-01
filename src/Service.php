<?php

namespace Wearesho\Bobra\Ubki;

use Carbon\Carbon;
use GuzzleHttp;
use Psr\Log;
use Wearesho\BaseCollection;
use Wearesho\Bobra\Ubki;

/**
 * Class Service
 * @package Wearesho\Bobra\Ubki
 */
abstract class Service implements ServiceInterface
{
    public const DOC = 'doc';
    public const UBKI = 'ubki';
    public const UBKI_DATA = 'ubkidata';
    public const ATTRIBUTE_SESSION_ID = 'sessid';
    public const REQUEST_ENVELOPE = 'req_envelope';
    public const REQUEST_XML = 'req_xml';
    public const REQUEST_TYPE = 'reqtype';
    public const REQUEST_REASON = 'reqreason';
    public const REQUEST_DATE = 'reqdate';
    public const REQUEST_LANGUAGE = 'reqlng';
    public const ATTRIBUTES = '_attributes';
    public const SESSION_ID = 'sessid';
    public const REQUEST = 'request';

    /** @var Ubki\Authorization\ConfigInterface */
    protected $config;

    /** @var GuzzleHttp\ClientInterface */
    protected $client;

    /** @var Ubki\Authorization\ProviderInterface */
    protected $authProvider;

    /** @var Log\LoggerInterface */
    protected $logger;

    public function __construct(
        Ubki\Authorization\ConfigInterface $config,
        Ubki\Authorization\ProviderInterface $authProvider,
        GuzzleHttp\ClientInterface $client,
        Log\LoggerInterface $logger = null
    ) {
        $this->config = $config;
        $this->authProvider = $authProvider;
        $this->client = $client;
        $this->logger = $logger ?? new Log\NullLogger();
    }

    /**
     * @param string $url
     * @param RequestInterface $request
     * @param array $headers
     *
     * @return Ubki\RequestResponsePair
     * @throws Ubki\Exception\Request
     */
    public function send(string $url, RequestInterface $request, array $headers = []): Ubki\RequestResponsePair
    {
        $body = $this->formBody(
            $request,
            $this->authProvider->provide($this->config)->getSessionId()
        );

        $this->logger->info('UBKI service: Send request to {url}', ['url' => $url]);

        try {
            $response = $this->client->request('POST', $url, [
                GuzzleHttp\RequestOptions::HEADERS => $headers,
                GuzzleHttp\RequestOptions::BODY => $body,
            ]);
        } catch (GuzzleHttp\Exception\GuzzleException $exception) {
            throw new Ubki\Exception\Request($request, $exception->getMessage(), $exception->getCode(), $exception);
        }

        return new Ubki\RequestResponsePair($body, (string)$response->getBody());
    }

    protected function formCollection($wrapper, $single, $data): array
    {
        return $data
            ? [
                $wrapper => [
                    $single => $data
                ]
            ]
            : [];
    }

    protected function collect(\Closure $callback, ?BaseCollection $collection)
    {
        $collect = \array_map($callback, $collection ? $collection->getArrayCopy() : []);

        if (!empty($collect)) {
            foreach ($collect as $key => $item) {
                $collect[$key] = \array_filter($item);
            }
        }

        return$collect;
    }

    /**
     * @param Dictionary|null $dictionary
     *
     * @return string|int|null
     */
    protected function fetchEnum(?Dictionary $dictionary)
    {
        return $dictionary
            ? $dictionary->getValue()
            : null;
    }

    protected function convertDate(?\DateTimeInterface $date): ?string
    {
        return $date
            ? Carbon::make($date)->toDateString()
            : null;
    }

    abstract protected function formBody(RequestInterface $request, string $sessionId): string;
}
