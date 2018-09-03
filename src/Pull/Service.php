<?php

namespace Wearesho\Bobra\Ubki\Pull;

use Carbon\Carbon;

use GuzzleHttp;

use Psr\Log;

use Wearesho\Bobra\Ubki;

/**
 * Class Service
 * @package Wearesho\Bobra\Ubki\Pull
 */
class Service
{
    /** @var ConfigInterface */
    protected $config;

    /** @var Ubki\Authorization\ProviderInterface */
    protected $authorization;

    /** @var GuzzleHttp\ClientInterface */
    protected $client;

    /** @var Log\LoggerInterface */
    protected $logger;

    public function __construct(
        ConfigInterface $config,
        Ubki\Authorization\ProviderInterface $authorization,
        GuzzleHttp\ClientInterface $client,
        Log\LoggerInterface $logger = null
    ) {
        $this->config = $config;
        $this->authorization = $authorization;
        $this->client = $client;
        $this->logger = $logger ?? new Log\NullLogger();
    }

    /**
     * @param Request $request
     *
     * @return Response
     * @throws GuzzleHttp\Exception\GuzzleException
     * @throws Ubki\Exception
     */
    public function send(Request $request): Ubki\Pull\Response
    {
        $guzzleRequest = $this->convertToGuzzleRequest($request);
        $responseBody = $this->client
            ->send($guzzleRequest)
            ->getBody()
            ->__toString();

        $document = new \DOMDocument('1.0', 'utf-8');
        $document->loadXML($responseBody);

        $this->checkErrors($document);

        return new Ubki\Pull\Response($document);
    }

    /**
     * @param Request $request
     *
     * @return GuzzleHttp\Psr7\Request
     */
    protected function convertToGuzzleRequest(Request $request): GuzzleHttp\Psr7\Request
    {
        return new GuzzleHttp\Psr7\Request(
            'post',
            $this->config->getPullUrl(),
            [],
            $this->getBody($request)
        );
    }

    /**
     * @param Request $request
     *
     * @return string
     */
    private function getBody(Request $request): string
    {
        $xml = new \DOMDocument('1.0', 'utf-8');

        // Create root element
        $xmlRoot = $xml->createElement('doc');
        $xmlRoot = $xml->appendChild($xmlRoot);

        $ubchElm = $xml->createElement('ubki');
        $ubchElm->setAttribute('sessid', $this->authorization->provide($this->config)->getSessionId());
        $ubchElm = $xmlRoot->appendChild($ubchElm);

        $envelopeElm = $xml->createElement('req_envelope');
        $envelopeElm = $ubchElm->appendChild($envelopeElm);

        $requestWrapperElm = $xml->createElement('req_xml');
        $requestWrapperElm = $envelopeElm->appendChild($requestWrapperElm);

        $requestElm = $xml->createElement('request');

        $requestElm->setAttribute('reqtype', $request->getType());
        $requestElm->setAttribute('reqreason', $request->getReason());
        $requestElm->setAttribute('reqdate', Carbon::instance($request->getDate())->toDateString());

        $requestElm = $requestWrapperElm->appendChild($requestElm);

        $identityWrapperElm = $xml->createElement('i');
        $identityWrapperElm->setAttribute('reqlng', $request->getLanguage());
        $identityWrapperElm = $requestElm->appendChild($identityWrapperElm);

        $identityElm = $xml->createElement('ident');
        $identityElm->setAttribute('okpo', $request->getInn());
        $identityWrapperElm->appendChild($identityElm);

        $mvdElm = $xml->createElement('mvd');
        $identityWrapperElm->appendChild($mvdElm);

        $blackListPhoneElm = $xml->createElement('bphone');
        $blackListPhoneElm->setAttribute('phone', null);
        $identityWrapperElm->appendChild($blackListPhoneElm);

        $xml->formatOutput = true;

        $requestXML = clone $xml;
        $requestXML->getElementsByTagName('req_xml')
            ->item(0)->textContent = base64_encode($xml->saveXML($requestElm));

        return $requestXML->saveXML();
    }

    /**
     * @param \DOMDocument $document
     *
     * @throws Ubki\Exception
     */
    private function checkErrors(\DOMDocument $document): void
    {
        $errorTags = $document->getElementsByTagName('error');

        if ($errorTags->length > 0) {
            $error = $errorTags->item(0);

            // todo: implement base exception for all response with <error> tag
            throw new Ubki\Exception(
                'There is an error in response: '
                . "type: {$error->getAttribute('ertype')};"
                . "\n"
                . "message: {$error->getAttribute('ertext')};"
            );
        }
    }
}
