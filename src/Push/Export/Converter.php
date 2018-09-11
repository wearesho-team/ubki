<?php

namespace Wearesho\Bobra\Ubki\Push\Export;

use Carbon\Carbon;

use Wearesho\Bobra\Ubki\Data\Interfaces;
use Wearesho\Bobra\Ubki\Infrastructure;

/**
 * Class Converter
 * @package Wearesho\Bobra\Ubki\Push\Export
 */
class Converter implements ConverterInterface
{
    /** @var \DOMDocument */
    private $document;

    public function dataDocumentToXml(
        Interfaces\RequestData $requestData,
        DataDocumentInterface $report,
        string $sessionId
    ): \DOMDocument {
        $this->document = new \DOMDocument('1.0', 'utf-8');

        $root = $this->document->createElement(static::DOC_ROOT);
        $ubki = $this->document->createElement(static::UBKI_ROOT);

        $ubki->setAttribute(static::ATTRIBUTE_SESSION_ID, $sessionId);

        $envelope = $this->document->createElement(static::REQUEST_ENVELOPE);
        $reqxml = $this->document->createElement(static::REQUEST_XML);
        $request = $this->createFilledElement($requestData);
        $ubkiData = $this->createDOMElement($report);
        $identification = $report->getIdentification();
        $identificationBlock = $this->createBlockInformation($identification);
        $credential = $identification->getCredential();
        $credentialElement = $this->createFilledElement($credential);

        $identificationBlock->appendChild($credentialElement);
        // todo: before first block need add tech
        $ubkiData->appendChild($identificationBlock);

        $creditsInformation = $report->getCreditDeals();

        if (!is_null($creditsInformation)) {
            $creditDeals = $creditsInformation->getCreditCollection();

            if (!empty($creditDeals)) {
                $creditsBlock = $this->createBlockInformation($creditsInformation);

                /** @var Interfaces\CreditDeal $creditDeal */
                foreach ($creditDeals as $creditDeal) {
                    $creditsBlock->appendChild($this->createFilledElement($creditDeal));
                }

                $ubkiData->appendChild($creditsBlock);
            }
        }

        $courtDecisionsInformation = $report->getCourtDecisions();

        if (!is_null($courtDecisionsInformation)) {
            $decisions = $courtDecisionsInformation->getDecisionCollection();

            if (!empty($decisions)) {
                $courtDecisionsBlock = $this->createBlockInformation($courtDecisionsInformation);

                /** @var Interfaces\CourtDecision $decision */
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
                $creditRequestsBlock = $this->createBlockInformation($creditRequestInformation);

                /** @var Interfaces\CreditRegister $creditRequest */
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
                $contactsBlock = $this->createBlockInformation($contactsInformation);

                /** @var Interfaces\Contact $contact */
                foreach ($contacts as $contact) {
                    $contactsBlock->appendChild($this->createFilledElement($contact));
                }

                $ubkiData->appendChild($contactsBlock);
            }
        }

        $request->appendChild($ubkiData);
        $reqxml->appendChild($request);
        $envelope->appendChild($reqxml);
        $ubki->appendChild($envelope);
        $root->appendChild($ubki);
        $this->document->appendChild($root);

        return $this->document;
    }

    private function createBlockInformation(Infrastructure\Block $block): \DOMElement
    {
        $element = $this->document->createElement($block->tag());
        $element->setAttribute(Infrastructure\Block::ATTR_ID, $block->getId());

        return $element;
    }

    private function createFilledElement(Infrastructure\ElementInterface $element): \DOMElement
    {
        $DOMElement = $this->createDOMElement($element);
        $this->setAttributesForElement($DOMElement, $element->jsonSerialize());

        return $DOMElement;
    }

    private function createDOMElement(Infrastructure\ElementInterface $element): \DOMElement
    {
        return $this->document->createElement($element->tag());
    }

    private function appendCollection(\DOMElement &$element, array $collection = []): \DOMElement
    {
        if (!empty($collection)) {
            /** @var Infrastructure\ElementInterface $item */
            foreach ($collection as $item) {
                $element->appendChild($this->createFilledElement($item));
            }
        }

        return $element;
    }

    private function setAttributesForElement(\DOMElement &$element, array $attributes = []): \DOMElement
    {
        foreach ($attributes as $key => $value) {
            if (!is_null($value)) {
                if ($value instanceof Infrastructure\Dictionary) {
                    $element->setAttribute($key, $value->getValue());
                } elseif ($value instanceof \DateTimeInterface) {
                    $element->setAttribute($key, Carbon::instance($value)->toDateString());
                } elseif (is_array($value)) {
                    $this->appendCollection($element, $value);
                } else {
                    $element->setAttribute($key, $value);
                }
            }
        }

        return $element;
    }
}
