<?php

namespace Wearesho\Bobra\Ubki\Push\Registry;

use Carbon\Carbon;
use GuzzleHttp;
use Psr\Log;
use Wearesho\Bobra\Ubki;

/**
 * Class Service
 *
 * @package Wearesho\Bobra\Ubki\Push\Registry
 */
class Service implements ServiceInterface
{
    /** @var ConfigInterface */
    protected $config;

    /** @var GuzzleHttp\ClientInterface */
    protected $client;

    /** @var Ubki\Authorization\ProviderInterface */
    protected $authProvider;

    /** @var Log\LoggerInterface */
    protected $logger;

    public function __construct(
        ConfigInterface $config,
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
     * @return ResponseInterface
     * @throws GuzzleHttp\Exception\GuzzleException
     * @throws \Exception
     */
    public function send(RequestInterface $request): ResponseInterface
    {
        $guzzleRequest = $this->convertToGuzzleRequest($request);

        $this->logger->debug("UBKI reestr request {url}", [
            'url' => $guzzleRequest->getUri()->__toString(),
        ]);

        /** @var GuzzleHttp\Psr7\Response $httpResponse */
        $httpResponse = $this->client->send($guzzleRequest);
        $responseBody = $httpResponse->getBody()->__toString();

        if ($this->config->isProductionMode()) {
            $fileUrl = $responseBody;

            try {
                $httpResponseFile = $this->getFile($fileUrl);
                $responseBody = $httpResponseFile->getBody()->__toString();
            } catch (GuzzleHttp\Exception\RequestException $exception) {
                $this->catchException($exception);
            }
        }

        $xml = simplexml_load_string($responseBody);

        if ($xml === false) {
            throw new \Exception('Invalid xml format');
        }

        $attributes = $xml->prot->attributes();

        $context = ((array)$attributes)["@attributes"];
        $requestType = $request->getTodo();

        switch ($requestType) {
            case Request::TYPE_REP:
                return new Rep\Response(
                    $requestType,
                    Carbon::createFromFormat('Ymd', $context->indate),
                    (string)$context->idout,
                    (string)$context->idalien,
                    (string)$context->sessid,
                    (string)$context->state,
                    (string)$context->oper,
                    (int)$context->compid,
                    (string)$context->item,
                    (string)$context->ertype,
                    (string)$context->crytical,
                    (int)$context->inn,
                    (string)$context->remark
                );
            case Request::TYPE_BIL:
                // TODO: need implement Bil request
                break;
        }
    }

    /**
     * @param GuzzleHttp\Exception\RequestException $exception
     *
     * @throws \Exception
     */
    protected function catchException(GuzzleHttp\Exception\RequestException $exception): void
    {
        $xml = simplexml_load_string($exception->getResponse()->getBody()->__toString());

        if ($xml === false || !isset($xml->prot)) {
            // Not XML or invalid format XML
            throw $exception;
        }

        throw new \Exception(
            (string)$xml->doc,
            Ubki\Exception::CODE_UNKNOWN_ERROR,
            $exception
        );
    }

    protected function convertToGuzzleRequest(RequestInterface $request): GuzzleHttp\Psr7\Request
    {
        return new GuzzleHttp\Psr7\Request(
            'post',
            $this->config->getReestrUrl(),
            [],
            base64_encode($this->getBody($request))
        );
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

        $root = $document->createElement(Request::TAG_ROOT);
        $root = $document->appendChild($root);

        $prot = $document->createElement(Request::TAG_PROT);
        $prot = $root->appendChild($prot);

        $todoAttr = $document->createAttribute(Request::ATTR_TODO);
        $todoAttr->value = $request->getTodo();
        $indateAttr = $document->createAttribute(Request::ATTR_INDATE);
        $indateAttr->value = $request->getIndate()->format('Ymd');
        $sessidAttr = $document->createAttribute(Request::ATTR_SESSID);
        $sessidAttr->value = $this->authProvider->provide()->getSessionId();

        $prot->appendChild($todoAttr);
        $prot->appendChild($indateAttr);
        $prot->appendChild($sessidAttr);

        $idout = $request->getIdout();

        if (!empty($idout)) {
            $idoutAttr = $document->createAttribute(Request::ATTR_IDOUT);
            $idoutAttr->value = $idout;

            $prot->appendChild($idoutAttr);
        }

        $idalien = $request->getIdalien();

        if (!empty($idalien)) {
            $idalienAttr = $document->createAttribute(Request::ATTR_IDALIEN);
            $idalienAttr->value = $idalien;

            $prot->appendChild($idalienAttr);
        }

        // TODO: implement adding grp attribute for Bil Request

        return $document->saveXML();
    }

    /**
     * @param string $url
     *
     * @return GuzzleHttp\Psr7\Response
     * @throws GuzzleHttp\Exception\GuzzleException
     */
    private function getFile(string $url): GuzzleHttp\Psr7\Response
    {
        /** @var GuzzleHttp\Psr7\Response $response */
        $response = $this->client->send(
            new GuzzleHttp\Psr7\Request(
                $method = 'get',
                $url,
                []
            )
        );

        return $response;
    }
}
