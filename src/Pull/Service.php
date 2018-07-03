<?php

namespace Wearesho\Bobra\Ubki\Pull;

use Carbon\Carbon;
use Wearesho\Bobra\Ubki\Authorization;

/**
 * Class Service
 * @package Wearesho\Bobra\Ubki\Pull
 */
class Service
{
    /** @var Authorization\Provider */
    protected $authorization;

    public function __construct(Authorization\Provider $authorization)
    {
        $this->authorization = $authorization;
    }

    /**
     * Получение XML ответа от БКИ
     *
     * @param Request $request
     * @return string
     */
    public function xml(Request $request): string
    {

    }

    private function getBody(Request $request, Authorization\Response $authorization): string
    {
        $xml = new \DOMDocument('1.0', 'utf-8');

        // Create root element
        $xmlRoot = $xml->createElement('doc');
        $xmlRoot = $xml->appendChild($xmlRoot);

        $ubchElm = $xml->createElement('ubki');
        $ubchElm->setAttribute('sessid', $authorization->getSessionId());
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
        $identityElm->setAttribute('okpo', $inn);
        $identityWrapperElm->appendChild($identityElm);

        $mvdElm = $xml->createElement('mvd');
        $identityWrapperElm->appendChild($mvdElm);

        $blackListPhoneElm = $xml->createElement('bphone');
        $blackListPhoneElm->setAttribute('phone', null);
        $identityWrapperElm->appendChild($blackListPhoneElm);

        $xml->formatOutput = true;

        $requestXML = clone $xml;
        $requestXML->getElementsByTagName('req_xml')->item(0)->textContent = base64_encode($xml->saveXML($requestElm));

        return $requestXML->saveXML();
    }
}