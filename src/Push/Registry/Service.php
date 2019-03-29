<?php

namespace Wearesho\Bobra\Ubki\Push\Registry;

use GuzzleHttp;
use Psr\Log;
use Spatie\ArrayToXml\ArrayToXml;
use Wearesho\Bobra\Ubki;

/**
 * Class Service
 * @package Wearesho\Bobra\Ubki\Push\Registry
 */
class Service implements ServiceInterface
{
    /** @var Ubki\Push\ConfigInterface */
    protected $config;

    /** @var GuzzleHttp\ClientInterface */
    protected $client;

    /** @var Ubki\Authorization\ProviderInterface */
    protected $authProvider;

    /** @var Log\LoggerInterface */
    protected $logger;

    public function __construct(
        Ubki\Push\ConfigInterface $config,
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
     * @param RequestInterface $request
     *
     * @return Ubki\RequestResponsePair
     * @throws GuzzleHttp\Exception\GuzzleException
     * @throws RequestException
     * @throws UnknownErrorException
     */
    public function send(RequestInterface $request): Ubki\RequestResponsePair
    {
        $guzzleRequest = $this->convertToGuzzleRequest($request);

        $this->logger->debug("UBKI registry request {url}", [
            'url' => (string)$guzzleRequest->getUri(),
        ]);

        $this->validateRequestType($request);

        /** @var GuzzleHttp\Psr7\Response $httpResponse */
        $response = $this->client->send($guzzleRequest);
        $urlFile = (string)$response->getBody();

        $this->validateUrl($urlFile);

        return new Ubki\RequestResponsePair(
            (string)$guzzleRequest->getBody(),
            $fileContent = $this->getFileContent($urlFile)
        );
    }

    protected function convertToGuzzleRequest(RequestInterface $request): GuzzleHttp\Psr7\Request
    {
        return new GuzzleHttp\Psr7\Request(
            'post',
            $this->config->getRegistryUrl(),
            [],
            \base64_encode($this->getBody($request))
        );
    }

    protected function validateRequestType(RequestInterface $request): void
    {
        $type = $request->getRegistryType();

        switch ($type) {
            case Type::REP:
            case Type::BIL:
                break;
            default:
                throw new UnsupportedRequestException($request, 'Invalid request type: ' . $type);
        }
    }

    /**
     * Xml body for Guzzle request
     *
     * @param RequestInterface $request
     *
     * @return string
     */
    private function getBody(RequestInterface $request): string
    {
        $idout = $request->getUbkiId();
        $idalien = $request->getPartnerId();
        $params = [
            Tag::REPORT => [
                '_attributes' => \array_merge(
                    [
                        Attribute::TYPE => $request->getRegistryType(),
                        Attribute::EXPORT_DATE => $request->getOperationDate()->format('Ymd'),
                        Attribute::SESSION_ID => $this->authProvider->provide($this->config)->getSessionId(),
                    ],
                    !empty($idout) ? [Attribute::UBKI_ID => $idout] : [],
                    !empty($idalien) ? [Attribute::PARTNER_ID => $idalien] : []
                ),
            ],
        ];

        // TODO: implement adding grp attribute for Bil Request

        return  ArrayToXml::convert($params, Tag::ROOT, true, 'utf-8');
    }

    /**
     * @param string $requestUrl
     *
     * @throws RequestException
     */
    private function validateUrl(string $requestUrl): void
    {
        if (!\preg_match('/https:\/\//', $requestUrl)) {
            throw new RequestException($requestUrl);
        }
    }

    /**
     * @param string $url
     *
     * @return string
     * @throws GuzzleHttp\Exception\GuzzleException
     * @throws UnknownErrorException
     */
    private function getFileContent(string $url): string
    {
        try {
            $response = $this->client->request('get', $url);
        } catch (GuzzleHttp\Exception\RequestException $exception) {
            if (\is_null($exception->getResponse())) {
                throw $exception;
            }

            throw new UnknownErrorException(
                (string)(simplexml_load_string((string)$exception->getResponse()->getBody())),
                $exception
            );
        }

        return (string)$response->getBody();
    }
}
