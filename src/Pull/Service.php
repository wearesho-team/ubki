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
class Service extends Ubki\SendService
{
    /** @var ConfigInterface */
    protected $config;

    /** @var Ubki\Authorization\ProviderInterface */
    protected $authProvider;

    protected $logMessage = 'UBKI import request';

    /** @var \DOMDocument */
    private $document;

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
        $response = $this->post($this->config->getPullUrl(), $this->getBody($request));

        return new Ubki\RequestResponsePair(
            $this->getRequest()->getBody()->__toString(),
            $response->getBody()->__toString()
        );
    }

    // todo: refactor
    private function getBody(RequestInterface $request): string
    {
        $this->document = new \DOMDocument('1.0', 'utf-8');

        // Create root element
        $root = $this->document->createElement($request->tag());
        $root = $this->document->appendChild($root);

        $ubchElm = $this->document->createElement(RequestInterface::UBKI_BLOCK);
        $ubchElm->setAttribute(
            RequestInterface::SESSION_ID,
            $this->authProvider->provide($this->config)->getSessionId()
        );
        $ubchElm = $root->appendChild($ubchElm);

        $envelopeElm = $this->document->createElement(RequestInterface::REQ_ENVELOPE_BLOCK);
        $envelopeElm = $ubchElm->appendChild($envelopeElm);

        $requestWrapperElm = $this->document->createElement('req_xml');
        $requestWrapperElm = $envelopeElm->appendChild($requestWrapperElm);

        $requestElm = $this->document->createElement('request');

        $head = $request->getHead();
        $requestElm->setAttribute('reqtype', $head->getType()->getValue());
        $requestElm->setAttribute('reqreason', $head->getReason()->getValue());
        $requestElm->setAttribute('reqdate', Carbon::instance($head->getDate())->toDateString());

        $requestElm = $requestWrapperElm->appendChild($requestElm);

        $requestContent = $request->getBody();
        $identityWrapperElm = $this->document->createElement($requestContent->tag());
        $identityWrapperElm->setAttribute(
            Ubki\Pull\Elements\RequestContent::LANGUAGE,
            $requestContent->getLanguage()->getValue()
        );
        $identityWrapperElm = $requestElm->appendChild($identityWrapperElm);

        $identification = $requestContent->getIdentification();
        $identityElm = $this->createFilledElement($identification);
        $identityWrapperElm->appendChild($identityElm);

        $contacts = $requestContent->getContacts();

        if (!is_null($contacts)) {
            $contactsElement = $identityWrapperElm->appendChild($this->createFilledElement($contacts));

            foreach ($contacts as $contact) {
                $contactsElement->appendChild($this->createFilledElement($contact));
            }
        }

        $documents = $requestContent->getDocuments();

        if (!is_null($documents)) {
            $documentsElement = $identityWrapperElm->appendChild($this->createFilledElement($documents));

            foreach ($documents as $document) {
                $documentsElement->appendChild($this->createFilledElement($document));
            }
        }

        $mvdElm = $this->document->createElement('mvd');
        $identityWrapperElm->appendChild($mvdElm);

        $blackListPhoneElm = $this->document->createElement('bphone');
        $blackListPhoneElm->setAttribute('phone', null);
        $identityWrapperElm->appendChild($blackListPhoneElm);

        $this->document->formatOutput = true;

        $requestXML = clone $this->document;
        $requestXML->getElementsByTagName('req_xml')
            ->item(0)->textContent = base64_encode($this->document->saveXML($requestElm));

        return $requestXML->saveXML();
    }

    private function createFilledElement(Ubki\ElementInterface $element = null)
    {
        $domElement = $this->document->createElement($element->tag());
        $attributes = $element->jsonSerialize();

        // todo: refactor
        foreach ($attributes as $attributeName => $attributeValue) {
            if (!is_null($attributeValue) && !is_object($attributeValue)) {
                $domElement->setAttribute($attributeName, $attributeValue);
            }
        }

        return $domElement;
    }
}
