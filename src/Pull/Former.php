<?php

namespace Wearesho\Bobra\Ubki\Pull;

use Carbon\Carbon;
use Wearesho\Bobra\Ubki;

/**
 * Class Former
 * @package Wearesho\Bobra\Ubki\Pull
 */
class Former extends Ubki\Infrastructure\Former implements FormerInterface
{
    /**
     * @param RequestInterface|Ubki\Infrastructure\RequestInterface $request
     * @param string $sessionId
     *
     * @return string
     */
    public function form(Ubki\Infrastructure\RequestInterface $request, string $sessionId): string
    {
        $this->init();

        return $this->getBody($request, $sessionId);
    }

    protected function getBody(RequestInterface $request, string $sessionId): string
    {
        // Create root element
        $root = $this->document->createElement($request->tag());
        $root = $this->document->appendChild($root);

        $ubchElm = $this->document->createElement(RequestInterface::UBKI_BLOCK);
        $ubchElm->setAttribute(RequestInterface::SESSION_ID, $sessionId);
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
            Ubki\Pull\Elements\RequestContentInterface::LANGUAGE,
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
}
