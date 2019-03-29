<?php

namespace Wearesho\Bobra\Ubki\Push\Registry;

use GuzzleHttp;
use Psr\Log;
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

    /** @var RequestInterface */
    private $request;

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
        $this->request = $request;
        $guzzleRequest = $this->convertToGuzzleRequest($this->request);

        $this->logger->debug("UBKI registry request {url}", [
            'url' => $guzzleRequest->getUri()->__toString(),
        ]);

        $this->validateRequestType($this->request);

        /** @var GuzzleHttp\Psr7\Response $httpResponse */
        $response = $this->client->send($guzzleRequest);
        $urlFile = $response->getBody()->__toString();

        $this->validateUrl($urlFile);

        return new Ubki\RequestResponsePair(
            $guzzleRequest->getBody()->__toString(),
            $fileContent = $this->getFileContent($urlFile)
        );
    }

    public function config(): Ubki\Push\ConfigInterface
    {
        return $this->config;
    }

    protected function convertToGuzzleRequest(RequestInterface $request): GuzzleHttp\Psr7\Request
    {
        return new GuzzleHttp\Psr7\Request(
            'post',
            $this->config->getRegistryUrl(),
            [],
            base64_encode($this->getBody($request))
        );
    }

    protected function validateRequestType(RequestInterface $request): void
    {
        switch ($request->getRegistryType()) {
            case Type::REP:
            case Type::BIL:
                break;
            default:
                throw new UnsupportedRequestException($request, 'Invalid request type: ' . $request->getRegistryType());
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
        $document = new \DOMDocument('1.0', 'utf-8');

        $root = $document->createElement(Tag::ROOT);
        $root = $document->appendChild($root);

        $prot = $document->createElement(Tag::REPORT);
        $prot = $root->appendChild($prot);

        $todoAttr = $document->createAttribute(Attribute::TYPE);
        $todoAttr->value = $request->getRegistryType();
        $indateAttr = $document->createAttribute(Attribute::EXPORT_DATE);
        $indateAttr->value = $request->getOperationDate()->format('Ymd');
        $sessidAttr = $document->createAttribute(Attribute::SESSION_ID);
        $sessidAttr->value = $this->authProvider->provide($this->config)->getSessionId();

        $prot->appendChild($todoAttr);
        $prot->appendChild($indateAttr);
        $prot->appendChild($sessidAttr);

        $idout = $request->getUbkiId();

        if (!empty($idout)) {
            $idoutAttr = $document->createAttribute(Attribute::UBKI_ID);
            $idoutAttr->value = $idout;

            $prot->appendChild($idoutAttr);
        }

        $idalien = $request->getPartnerId();

        if (!empty($idalien)) {
            $idalienAttr = $document->createAttribute(Attribute::PARTNER_ID);
            $idalienAttr->value = $idalien;

            $prot->appendChild($idalienAttr);
        }

        // TODO: implement adding grp attribute for Bil Request

        return $document->saveXML();
    }

    /**
     * @param string $requestUrl
     *
     * @throws RequestException
     */
    private function validateUrl(string $requestUrl): void
    {
        if (!preg_match('/https:\/\//', $requestUrl)) {
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
            $response = $this->client->send(
                new GuzzleHttp\Psr7\Request(
                    $method = 'get',
                    $url,
                    []
                )
            );
        } catch (GuzzleHttp\Exception\RequestException $exception) {
            if (is_null($exception->getResponse())) {
                throw $exception;
            }

            throw new UnknownErrorException(
                (string)(simplexml_load_string($exception->getResponse()->getBody()->__toString())),
                $exception
            );
        }

        return $response->getBody()->__toString();
    }
}
