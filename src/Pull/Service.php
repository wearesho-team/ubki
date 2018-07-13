<?php

namespace Wearesho\Bobra\Ubki\Pull;

use Carbon\Carbon;

use GuzzleHttp;

use Psr\Log;

use Wearesho\Bobra\Ubki\Authorization;

/**
 * Class Service
 * @package Wearesho\Bobra\Ubki\Pull
 */
class Service
{
    /** @var ConfigInterface */
    protected $config;

    /** @var Authorization\ProviderInterface */
    protected $authorization;

    /** @var GuzzleHttp\ClientInterface */
    protected $client;

    /** @var Log\LoggerInterface */
    protected $logger;

    public function __construct(
        ConfigInterface $config,
        Authorization\ProviderInterface $authorization,
        GuzzleHttp\ClientInterface $client,
        Log\LoggerInterface $logger
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
     * @throws Authorization\Exception
     * @throws GuzzleHttp\Exception\GuzzleException
     */
    public function send(Request $request): Response
    {
        $guzzleRequest = $this->convertToGuzzleRequest($request);



        return $this->client
            ->send($guzzleRequest)
            ->getBody()
            ->__toString();
    }

    /**
     * @param Request $request
     *
     * @return GuzzleHttp\Psr7\Request
     * @throws Authorization\Exception
     * @throws GuzzleHttp\Exception\GuzzleException
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
     * @throws Authorization\Exception
     * @throws GuzzleHttp\Exception\GuzzleException
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
}
