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
    /**
     * @param RequestInterface $request
     * @param string $sessionId
     *
     * @return string
     * @throws FormerException
     */
    public function form(RequestInterface $request, string $sessionId): string
    {
        try {
            $document = new \DOMDocument('1.0', 'utf-8');

            $root = $document->createElement(static::DOC_ROOT);

            $ubki = $document->createElement(static::UBKI_ROOT);
            $ubki->setAttribute(static::ATTRIBUTE_SESSION_ID, $sessionId);

            $envelope = $document->createElement(static::REQUEST_ENVELOPE);

            $reqxml = $document->createElement(static::REQUEST_XML);

            $requestDataWrapper = $this->formHeadElement($document, $request->getHead());

            $ubkiData = $document->createElement($request->getBody()->tag());

            $identification = $request->getBody()->getIdentification();
            $identificationBlock = $this->createBlockInformation($document, $identification);
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

            $requestDataWrapper->appendChild($ubkiData);
            $reqxml->appendChild($requestDataWrapper);
            $envelope->appendChild($reqxml);
            $ubki->appendChild($envelope);
            $root->appendChild($ubki);
            $document->appendChild($root);
        } catch (\Throwable $exception) {
            throw new FormerException($request, $exception->getMessage(), $exception->getCode());
        }

        return $document;
    }

    protected function formHeadElement(\DOMDocument $document, Ubki\Data\Interfaces\RequestData $data): \DOMElement
    {
        $requestDataWrapper = $this->createDOMElement($document, $data);

        return $this->setAttributes($requestDataWrapper, [
            Ubki\Data\Interfaces\RequestData::ID => $data->getId(),
            Ubki\Data\Interfaces\RequestData::DATE => $data->getDate(),
            Ubki\Data\Interfaces\RequestData::TYPE => $data->getType(),
            Ubki\Data\Interfaces\RequestData::INITIATOR => $data->getInitiator(),
            Ubki\Data\Interfaces\RequestData::REASON => $data->getReason(),
            Ubki\Data\Interfaces\RequestData::VERSION => $data->getVersion(),
        ]);
    }

    protected function createBlockInformation(\DOMDocument $document, Ubki\Infrastructure\Block $block): \DOMElement
    {
        $element = $this->createDOMElement($document, $block);
        $element->setAttribute(Ubki\Infrastructure\Block::ATTR_ID, $block->getId());

        return $element;
    }

    protected function createDOMElement(
        \DOMDocument $document,
        Ubki\Infrastructure\ElementInterface $element
    ): \DOMElement {
        return $document->createElement($element->tag());
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
