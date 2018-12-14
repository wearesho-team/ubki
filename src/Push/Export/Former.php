<?php

namespace Wearesho\Bobra\Ubki\Push\Export;

use Wearesho\BaseCollection;
use Wearesho\Bobra\Ubki;

/**
 * Class Former
 * @package Wearesho\Bobra\Ubki\Push\Export
 */
class Former extends Ubki\Infrastructure\Former implements FormerInterface
{
    /**
     * @param RequestInterface|Ubki\Infrastructure\RequestInterface $request
     * @param string $sessionId
     *
     * @return string
     * @throws Ubki\Exception\Former
     */
    public function form(Ubki\Infrastructure\RequestInterface $request, string $sessionId): string
    {
        $this->init();

        return $this->getBody($request, $sessionId);
    }

    /**
     * @param RequestInterface $request
     * @param string $sessionId
     *
     * @return string
     * @throws Ubki\Exception\Former
     */
    protected function getBody(RequestInterface $request, string $sessionId): string
    {
        try {
            // root tags
            $root = $this->document->createElement($request->tag());
            $ubki = $this->document->createElement(static::UBKI_ROOT);

            $ubki->setAttribute(static::ATTRIBUTE_SESSION_ID, $sessionId);

            // head tags
            $envelope = $this->document->createElement(static::REQUEST_ENVELOPE);
            $reqxml = $this->document->createElement(static::REQUEST_XML);
            $requestDataWrapper = $this->createFilledElement($request->getHead());
            $ubkiData = $this->createFilledElement($request->getBody());

            // data
            $identification = $request->getBody()->getIdentification();
            $identificationBlock = $this->createFilledElement($identification);
            $credentialElement = $this->formCredential($identification->getCredential());
            $identificationBlock->appendChild($credentialElement);
            $ubkiData->appendChild($identificationBlock);

            $report = $request->getBody();
            $creditsInformation = $report->getCreditDeals();

            if (!is_null($creditsInformation)) {
                $creditDeals = $creditsInformation->getDeals();

                if (!empty($creditDeals)) {
                    $creditsBlock = $this->createFilledElement($creditsInformation);

                    /** @var Ubki\Data\Interfaces\CreditDeal $creditDeal */
                    foreach ($creditDeals as $creditDeal) {
                        $creditsBlock->appendChild($this->formCreditDeal($creditDeal));
                    }

                    $ubkiData->appendChild($creditsBlock);
                }
            }

            $courtDecisionsInformation = $report->getCourtDecisions();

            if (!is_null($courtDecisionsInformation)) {
                $decisions = $courtDecisionsInformation->getDecisions();

                if (!empty($decisions)) {
                    $courtDecisionsBlock = $this->createFilledElement($courtDecisionsInformation);

                    /** @var Ubki\Data\Interfaces\CourtDecision $decision */
                    foreach ($decisions as $decision) {
                        $courtDecisionsBlock->appendChild($this->createFilledElement($decision));
                    }

                    $ubkiData->appendChild($courtDecisionsBlock);
                }
            }

            $creditRequestInformation = $report->getCreditRequests();

            if (!is_null($creditRequestInformation)) {
                $creditRequests = $creditRequestInformation->getCreditRequests();

                if (!empty($creditRequests)) {
                    $creditRequestsBlock = $this->createFilledElement($creditRequestInformation);

                    /** @var Ubki\Data\Interfaces\CreditRequest $creditRequest */
                    foreach ($creditRequests as $creditRequest) {
                        $creditRequestsBlock->appendChild($this->createFilledElement($creditRequest));
                    }

                    $registryTimes = $creditRequestInformation->getRegistryTimes();

                    if (!is_null($registryTimes)) {
                        $creditRequestsBlock->appendChild($this->createFilledElement($registryTimes));
                    }

                    $ubkiData->appendChild($creditRequestsBlock);
                }
            }

            $contactsInformation = $report->getContacts();

            if (!is_null($contactsInformation)) {
                $contacts = $contactsInformation->getContacts();

                if (!empty($contacts)) {
                    $contactsBlock = $this->createFilledElement($contactsInformation);

                    /** @var Ubki\Data\Interfaces\Contact $contact */
                    foreach ($contacts as $contact) {
                        $contactsBlock->appendChild($this->createFilledElement($contact));
                    }

                    $ubkiData->appendChild($contactsBlock);
                }
            }

            $requestDataWrapper->appendChild($ubkiData);
            $reqxml->appendChild($requestDataWrapper);
            $envelope->appendChild($reqxml);
            $ubki->appendChild($envelope);
            $root->appendChild($ubki);
            $this->document->appendChild($root);
            $this->document->formatOutput = $this->prettyPrint;
        } catch (\Throwable $exception) {
            throw new Ubki\Exception\Former($request, $this, $exception->getMessage(), $exception->getCode());
        }

        return $this->document->saveXML();
    }

    protected function appendCollectionTo(
        \DOMElement $wrapper,
        BaseCollection $collection = null
    ): \DOMElement {
        foreach ((array)$collection as $item) {
            $wrapper->appendChild($this->createFilledElement($item));
        }

        return $wrapper;
    }

    protected function formCredential(Ubki\Data\Interfaces\Credential $credential): \DOMElement
    {
        $credentialElement = $this->createDOMElement($credential);

        $this->setAttributes($credentialElement, $credential);

        $this->appendCollectionTo($credentialElement, $credential->getIdentifiers());
        $this->appendCollectionTo($credentialElement, $credential->getLinkedPersons());
        $this->appendCollectionTo($credentialElement, $credential->getWorks());
        $this->appendCollectionTo($credentialElement, $credential->getDocuments());
        $this->appendCollectionTo($credentialElement, $credential->getAddresses());
        $this->appendCollectionTo($credentialElement, $credential->getPhotos());

        return $credentialElement;
    }

    protected function formCreditDeal(Ubki\Data\Interfaces\CreditDeal $deal): \DOMElement
    {
        return $this->appendCollectionTo($this->createFilledElement($deal), $deal->getDealLifes());
    }

    protected function createDOMElement(Ubki\Infrastructure\ElementInterface $element): \DOMElement
    {
        return $this->document->createElement($element->tag());
    }
}
