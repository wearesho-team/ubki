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
    protected $authProvider;

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
        $this->authProvider = $authorization;
        $this->client = $client;
        $this->logger = $logger ?? new Log\NullLogger();
    }

    /**
     * @param Request $request
     *
     * @return Ubki\RequestResponsePair
     * @throws GuzzleHttp\Exception\GuzzleException
     */
    public function send(Request $request): Ubki\RequestResponsePair
    {
        $guzzleRequest = $this->convertToGuzzleRequest($request);
        $responseBody = $this->client->send($guzzleRequest);

        return new Ubki\RequestResponsePair(
            $guzzleRequest->getBody()->__toString(),
            $responseBody->getBody()->__toString()
        );
    }

    protected function convertToGuzzleRequest(RequestInterface $request): GuzzleHttp\Psr7\Request
    {
        return new GuzzleHttp\Psr7\Request(
            'post',
            $this->config->getPullUrl(),
            [],
            $this->getBody($request)
        );
    }

    private function getBody(RequestInterface $request): string
    {
        $xml = new \DOMDocument('1.0', 'utf-8');

        // Create root element
        $xmlRoot = $xml->createElement(RequestInterface::TAG);
        $xmlRoot = $xml->appendChild($xmlRoot);

        $ubchElm = $xml->createElement(RequestInterface::UBKI_BLOCK);
        $ubchElm->setAttribute(
            RequestInterface::SESSION_ID,
            $this->authProvider->provide($this->config)->getSessionId()
        );
        $ubchElm = $xmlRoot->appendChild($ubchElm);

        $envelopeElm = $xml->createElement(RequestInterface::REQ_ENVELOPE_BLOCK);
        $envelopeElm = $ubchElm->appendChild($envelopeElm);

        $requestWrapperElm = $xml->createElement('req_xml');
        $requestWrapperElm = $envelopeElm->appendChild($requestWrapperElm);

        $requestElm = $xml->createElement('request');

        $head = $request->getHead();
        $requestElm->setAttribute('reqtype', $head->getType()->getValue());
        $requestElm->setAttribute('reqreason', $head->getReason()->getValue());
        $requestElm->setAttribute('reqdate', Carbon::instance($head->getDate())->toDateString());

        $requestElm = $requestWrapperElm->appendChild($requestElm);

        $body = $request->getBody();
        $identityWrapperElm = $xml->createElement('i');
        $identityWrapperElm->setAttribute('reqlng', $body->getLanguage()->getValue());
        $identityWrapperElm = $requestElm->appendChild($identityWrapperElm);

        $identityElm = $xml->createElement('ident');
        $identityElm->setAttribute('okpo', $body->getInn());
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
}
