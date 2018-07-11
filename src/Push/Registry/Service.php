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
    protected const TAG_ROOT = 'doc';
    protected const TAG_PROT = 'prot';
    protected const ATTR_TODO = 'todo';
    protected const ATTR_INDATE = 'indate';
    protected const ATTR_IDOUT = 'idout';
    protected const ATTR_IDALIEN = 'idalien';
    protected const ATTR_SESSID = 'sessid';

    protected const ATTR_STATE = 'state';
    protected const ATTR_OPER = 'oper';
    protected const ATTR_COMPID = 'compid';
    protected const ATTR_ITEM = 'item';
    protected const ATTR_ERTYPE = 'ertype';
    protected const ATTR_CRYTICAL = 'crytical';
    protected const ATTR_INN = 'inn';
    protected const ATTR_REMARK = 'remark';

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
     * @return ResponseCollection
     * @throws GuzzleHttp\Exception\GuzzleException
     * @throws UnsupportedRequestException
     * @throws \Exception
     */
    public function send(RequestInterface $request): ResponseCollection
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

        $reports = $this->fetchReports($responseBody);
        $requestType = $request->getRegistryType();

        switch ($requestType) {
            case Type::REP:
                return
                    new ResponseCollection(
                        array_map(
                            function (\SimpleXMLElement $report): Rep\Response {
                                $attributes = $report->attributes();

                                return new Rep\Response(
                                    Carbon::createFromFormat('Ymd', (string)$attributes[static::ATTR_INDATE]),
                                    (string)$attributes[static::ATTR_IDOUT],
                                    (string)$attributes[static::ATTR_IDALIEN],
                                    (string)$attributes[static::ATTR_SESSID],
                                    (string)$attributes[static::ATTR_STATE],
                                    (string)$attributes[static::ATTR_OPER],
                                    (int)$attributes[static::ATTR_COMPID],
                                    (string)$attributes[static::ATTR_ITEM],
                                    (string)$attributes[static::ATTR_ERTYPE],
                                    (string)$attributes[static::ATTR_CRYTICAL],
                                    (int)$attributes[static::ATTR_INN],
                                    (string)$attributes[static::ATTR_REMARK]
                                );
                            },
                            $reports
                        )
                    );
            case Type::BIL: // TODO: need implement Bil request
            default:
                throw new UnsupportedRequestException(
                    $request,
                    "Unsupported request type: {$request->getRegistryType()}"
                );
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

        throw new UnknownErrorException(
            (string)$xml->doc,
            $exception
        );
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

        $root = $document->createElement(static::TAG_ROOT);
        $root = $document->appendChild($root);

        $prot = $document->createElement(static::TAG_PROT);
        $prot = $root->appendChild($prot);

        $todoAttr = $document->createAttribute(static::ATTR_TODO);
        $todoAttr->value = $request->getRegistryType();
        $indateAttr = $document->createAttribute(static::ATTR_INDATE);
        $indateAttr->value = $request->getOperationDate()->format('Ymd');
        $sessidAttr = $document->createAttribute(static::ATTR_SESSID);
        $sessidAttr->value = $this->authProvider->provide($this->config)->getSessionId();

        $prot->appendChild($todoAttr);
        $prot->appendChild($indateAttr);
        $prot->appendChild($sessidAttr);

        $idout = $request->getUbkiId();

        if (!empty($idout)) {
            $idoutAttr = $document->createAttribute(static::ATTR_IDOUT);
            $idoutAttr->value = $idout;

            $prot->appendChild($idoutAttr);
        }

        $idalien = $request->getPartnerId();

        if (!empty($idalien)) {
            $idalienAttr = $document->createAttribute(static::ATTR_IDALIEN);
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

    /**
     * @param string $body
     *
     * @return \SimpleXMLElement[]
     */
    private function fetchReports(string $body): array
    {
        $reports = [];
        $xml = simplexml_load_string($body);
        $xmlReports = $xml->{static::TAG_PROT};

        foreach ($xmlReports as $xmlReport) {
            array_push($reports, $xmlReport);
        }

        return $reports;
    }
}
