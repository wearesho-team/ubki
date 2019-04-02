<?php

namespace Wearesho\Bobra\Ubki\Push\Registry;

use GuzzleHttp;
use Psr\Log;
use Spatie\ArrayToXml\ArrayToXml;
use Wearesho\Bobra\Ubki;

/**
 * Class Service
 * @package Wearesho\Bobra\Ubki\Push\Registry
 *
 * @property  Ubki\Push\ConfigInterface $config
 */
class Service extends Ubki\Service implements ServiceInterface
{
    public function __construct(
        Ubki\Push\ConfigInterface $config,
        Ubki\Authorization\ProviderInterface $authProvider,
        GuzzleHttp\ClientInterface $client,
        Log\LoggerInterface $logger = null
    ) {
        parent::__construct($config, $authProvider, $client, $logger ?? new Log\NullLogger());
    }

    /**
     * @param RequestInterface $request
     *
     * @return Ubki\RequestResponsePair
     * @throws GuzzleHttp\Exception\GuzzleException
     * @throws RequestException
     * @throws Ubki\Exception\Request
     * @throws Ubki\Exception\UnknownError
     */
    public function registry(RequestInterface $request): Ubki\RequestResponsePair
    {
        $this->validateRequestType($request);

        /** @var GuzzleHttp\Psr7\Response $httpResponse */
        $pair = $this->send($this->config->getRegistryUrl(), $request);
        $fileUrl = $pair->getResponse();

        $this->validateUrl($fileUrl);

        return new Ubki\RequestResponsePair(
            (string)$pair->getRequest(),
            $fileContent = $this->getFileContent($fileUrl)
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
     * @throws Ubki\Exception\UnknownError
     */
    private function getFileContent(string $url): string
    {
        try {
            $response = $this->client->request('GET', $url);
        } catch (GuzzleHttp\Exception\RequestException $exception) {
            if (!$exception->hasResponse()) {
                throw $exception;
            }

            throw new Ubki\Exception\UnknownError(
                (string)(simplexml_load_string((string)$exception->getResponse()->getBody())),
                $exception
            );
        }

        return (string)$response->getBody();
    }

    /**
     * @param RequestInterface|Ubki\RequestInterface $request
     * @param string $sessionId
     *
     * @return string
     */
    protected function formBody(Ubki\RequestInterface $request, string $sessionId): string
    {
        $idout = $request->getUbkiId();
        $idalien = $request->getPartnerId();
        $params = [
            Tag::REPORT => [
                static::ATTRIBUTES => \array_merge(
                    [
                        Attribute::TYPE => $request->getRegistryType(),
                        Attribute::EXPORT_DATE => $request->getOperationDate()->format('Ymd'),
                        Attribute::SESSION_ID => $sessionId,
                    ],
                    !empty($idout) ? [Attribute::UBKI_ID => $idout] : [],
                    !empty($idalien) ? [Attribute::PARTNER_ID => $idalien] : []
                ),
            ],
        ];

        // TODO: implement adding grp attribute for Bil Request

        return ArrayToXml::convert($params, Tag::ROOT, true, 'utf-8');
    }
}
