<?php

namespace Wearesho\Bobra\Ubki\Push\Export;

use Carbon\Carbon;
use Wearesho\Bobra\Ubki;

/**
 * Class Former
 * @package Wearesho\Bobra\Ubki\Push\Export
 */
class Former implements FormerInterface
{
    /** @var Ubki\Data\Interfaces\RequestData */
    protected $requestData;

    /** @var DataDocumentInterface */
    protected $report;

    /** @var string */
    protected $sessionId;

    public function __construct(
        Ubki\Data\Interfaces\RequestData $requestData,
        DataDocumentInterface $report,
        string $sessionId
    ) {
        $this->requestData = $requestData;
        $this->report = $report;
        $this->sessionId = $sessionId;
    }

    public function form(): string
    {
        $document = new \DOMDocument('1.0', 'utf-8');

        $root = $document->createElement(static::DOC_ROOT);
        $ubki = $document->createElement(static::UBKI_ROOT);

        $ubki->setAttribute(static::ATTRIBUTE_SESSION_ID, $this->sessionId);

        $envelope = $document->createElement(static::REQUEST_ENVELOPE);
        $reqxml = $document->createElement(static::REQUEST_XML);

        $requestDataWrapper = $document->createElement(Ubki\Data\Interfaces\RequestData::TAG);
        $this->setAttributes($requestDataWrapper, [
            Ubki\Data\Interfaces\RequestData::ID => $this->requestData->getId(),
            Ubki\Data\Interfaces\RequestData::DATE => $this->requestData->getDate(),
            Ubki\Data\Interfaces\RequestData::TYPE => $this->requestData->getType(),
            Ubki\Data\Interfaces\RequestData::INITIATOR => $this->requestData->getInitiator(),
            Ubki\Data\Interfaces\RequestData::REASON => $this->requestData->getReason(),
            Ubki\Data\Interfaces\RequestData::VERSION => $this->requestData->getVersion(),
        ]);

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
            $creditDeals = $creditsInformation->getDeals();

            if (!empty($creditDeals)) {
                $creditsBlock = $this->createBlockInformation($creditsInformation);

                /** @var Ubki\Data\Interfaces\CreditDeal $creditDeal */
                foreach ($creditDeals as $creditDeal) {
                    $creditsBlock->appendChild($this->createFilledElement($creditDeal));
                }

                $ubkiData->appendChild($creditsBlock);
            }
        }

        $courtDecisionsInformation = $report->getCourtDecisions();

        if (!is_null($courtDecisionsInformation)) {
            $decisions = $courtDecisionsInformation->getDecisions();

            if (!empty($decisions)) {
                $courtDecisionsBlock = $this->createBlockInformation($courtDecisionsInformation);

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
                $creditRequestsBlock = $this->createBlockInformation($creditRequestInformation);

                /** @var Ubki\Data\Interfaces\CreditRegister $creditRequest */
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

                /** @var Ubki\Data\Interfaces\Contact $contact */
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

    private function createBlockInformation(Ubki\Infrastructure\Block $block): \DOMElement
    {
        $element = $this->document->createElement($block->tag());
        $element->setAttribute(Ubki\Infrastructure\Block::ATTR_ID, $block->getId());

        return $element;
    }

    private function createDOMElement(Ubki\Infrastructure\ElementInterface $element): \DOMElement
    {
        return $this->document->createElement($element->tag());
    }

    private function appendCollection(\DOMElement &$element, array $collection = []): \DOMElement
    {
        if (!empty($collection)) {
            /** @var Ubki\Infrastructure\ElementInterface $item */
            foreach ($collection as $item) {
                $element->appendChild($this->createFilledElement($item));
            }
        }

        return $element;
    }

    private function setAttributes(\DOMElement &$element, array $attributes = []): \DOMElement
    {
        foreach ($attributes as $key => $value) {
            if (!is_null($value)) {
                if ($value instanceof Ubki\Infrastructure\Dictionary) {
                    $element->setAttribute($key, $value->getValue());
                } elseif ($value instanceof \DateTimeInterface) {
                    $element->setAttribute($key, Carbon::instance($value)->toDateString());
                } else {
                    $element->setAttribute($key, $value);
                }
            }
        }

        return $element;
    }
}
