<?php

namespace Wearesho\Bobra\Ubki\Push\Export;

use Carbon\Carbon;

use Wearesho\Bobra\Ubki\Block;
use Wearesho\Bobra\Ubki\Blocks;
use Wearesho\Bobra\Ubki\ElementInterface;
use Wearesho\Bobra\Ubki\Reference;

/**
 * Class Converter
 * @package Wearesho\Bobra\Ubki\Push\Export
 */
class Converter implements ConverterInterface
{
    /** @var \DOMDocument */
    private $document;

    public function dataDocumentToXml(
        Blocks\Interfaces\RequestData $requestData,
        DataDocumentInterface $report,
        string $sessionId
    ): \DOMDocument {
        $this->document = new \DOMDocument('1.0', 'utf-8');

        $root = $this->document->createElement(static::DOC_ROOT);
        $ubki = $this->document->createElement(static::UBKI_ROOT);
        $ubki->setAttribute(static::SESSION_ID, $sessionId);
        $envelope = $this->document->createElement(static::REQUEST_ENVELOPE);
        $reqxml = $this->document->createElement(static::REQUEST_XML);

        $request = $this->createFilledElement($requestData, [
            Blocks\Interfaces\RequestData::ID => $requestData->getId(),
            Blocks\Interfaces\RequestData::DATE => $requestData->getDate(),
            Blocks\Interfaces\RequestData::TYPE => $requestData->getType(),
            Blocks\Interfaces\RequestData::REASON => $requestData->getReason(),
            Blocks\Interfaces\RequestData::INITIATOR => $requestData->getInitiator(),
            Blocks\Interfaces\RequestData::VERSION => $requestData->getVersion(),
        ]);

        $ubkiData = $this->createElement($report);

        $identification = $report->getIdentification();
        $identificationBlock = $this->createBlockInformation($identification);

        $credential = $identification->getCredential();
        $credentialElement = $this->createFilledElement($credential, [
            Blocks\Interfaces\Credential::LANGUAGE => $credential->getLanguage(),
            Blocks\Interfaces\Credential::NAME => $credential->getName(),
            Blocks\Interfaces\Credential::PATRONYMIC => $credential->getPatronymic(),
            Blocks\Interfaces\Credential::SURNAME => $credential->getSurname(),
            Blocks\Interfaces\Credential::BIRTH_DATE => $credential->getBirthDate(),
            Blocks\Interfaces\Credential::INN => $credential->getInn(),
        ]);

        /** @var Blocks\Interfaces\Identifier $identifier */
        foreach ($credential->getIdentifiers() as $identifier) {
            if ($identifier instanceof Blocks\Interfaces\NaturalIdentifier) {
                $attributes = [
                    Blocks\Interfaces\NaturalIdentifier::NAME => $identifier->getName(),
                    Blocks\Interfaces\NaturalIdentifier::MIDDLE_NAME => $identifier->getPatronymic(),
                    Blocks\Interfaces\NaturalIdentifier::LAST_NAME => $identifier->getSurname(),
                    Blocks\Interfaces\NaturalIdentifier::INN => $identifier->getInn(),
                    Blocks\Interfaces\NaturalIdentifier::BIRTH_DATE => $identifier->getBirthDate(),
                    Blocks\Interfaces\NaturalIdentifier::CREATED_AT => $identifier->getCreatedAt(),
                    Blocks\Interfaces\NaturalIdentifier::CHILDREN_COUNT => $identifier->getChildrenCount(),
                    Blocks\Interfaces\NaturalIdentifier::LANGUAGE => $identifier->getLanguage(),
                    Blocks\Interfaces\NaturalIdentifier::EDUCATION => $identifier->getEducation(),
                    Blocks\Interfaces\NaturalIdentifier::FAMILY_STATUS => $identifier->getFamilyStatus(),
                    Blocks\Interfaces\NaturalIdentifier::GENDER => $identifier->getGender(),
                    Blocks\Interfaces\NaturalIdentifier::NATIONALITY => $identifier->getNationality(),
                    Blocks\Interfaces\NaturalIdentifier::REGISTRATION_SPD => $identifier->getRegistrationSpd(),
                    Blocks\Interfaces\NaturalIdentifier::SOCIAL_STATUS => $identifier->getSocialStatus(),
                ];
            } else {
                /** @var Blocks\Interfaces\LegalIdentifier $identifier */
                $attributes = [
                    Blocks\Interfaces\LegalIdentifier::LANGUAGE => $identifier->getLanguage(),
                    Blocks\Interfaces\LegalIdentifier::CREATED_AT => $identifier->getCreatedAt(),
                    Blocks\Interfaces\LegalIdentifier::NAME => $identifier->getName(),
                    Blocks\Interfaces\LegalIdentifier::TAX_REGISTRATION_DATE => $identifier->getTaxRegistrationDate(),
                    Blocks\Interfaces\LegalIdentifier::EDR_REGISTRATION_DATE => $identifier->getEdrRegistrationDate(),
                    Blocks\Interfaces\LegalIdentifier::ECONOMY_BRANCH => $identifier->getEconomyBranch(),
                    Blocks\Interfaces\LegalIdentifier::ACTIVITY_TYPE => $identifier->getActivityType(),
                    Blocks\Interfaces\LegalIdentifier::ERGPOU => $identifier->getErgpou(),
                    Blocks\Interfaces\LegalIdentifier::FORM => $identifier->getForm(),
                ];
            }

            $credentialElement->appendChild($this->createFilledElement($identifier, $attributes));
        }

        $linkedPersons = $credential->getLinkedPersons();

        if (!is_null($linkedPersons) && !empty($linkedPersons)) {
            /** @var Blocks\Interfaces\LinkedPerson $linkedPerson */
            foreach ($linkedPersons as $linkedPerson) {
                $credentialElement->appendChild(
                    $this->createFilledElement($linkedPerson, [
                        Blocks\Interfaces\LinkedPerson::NAME => $linkedPerson->getName(),
                        Blocks\Interfaces\LinkedPerson::ERGPOU => $linkedPerson->getErgpou(),
                        Blocks\Interfaces\LinkedPerson::ISSUE_DATE => $linkedPerson->getIssueDate(),
                        Blocks\Interfaces\LinkedPerson::ROLE => $linkedPerson->getRole(),
                    ])
                );
            }
        }

        $works = $credential->getWorks();

        if (!is_null($works) && !empty($works)) {
            /** @var Blocks\Interfaces\Work $work */
            foreach ($works as $work) {
                $credentialElement->appendChild(
                    $this->createFilledElement($work, [
                        Blocks\Interfaces\Work::NAME => $work->getName(),
                        Blocks\Interfaces\Work::ERGPOU => $work->getErgpou(),
                        Blocks\Interfaces\Work::CREATED_AT => $work->getCreatedAt(),
                        Blocks\Interfaces\Work::EXPERIENCE => $work->getExperience(),
                        Blocks\Interfaces\Work::INCOME => $work->getIncome(),
                        Blocks\Interfaces\Work::LANGUAGE => $work->getLanguage(),
                        Blocks\Interfaces\Work::RANK => $work->getRank(),
                    ])
                );
            }
        }

        /** @var Blocks\Interfaces\Document $identifierDocument */
        foreach ($credential->getDocuments() as $identifierDocument) {
            $credentialElement->appendChild(
                $this->createFilledElement($identifierDocument, [
                    Blocks\Interfaces\Document::CREATED_AT => $identifierDocument->getCreatedAt(),
                    Blocks\Interfaces\Document::LANGUAGE => $identifierDocument->getLanguage(),
                    Blocks\Interfaces\Document::TYPE => $identifierDocument->getType(),
                    Blocks\Interfaces\Document::NUMBER => $identifierDocument->getNumber(),
                    Blocks\Interfaces\Document::SERIAL => $identifierDocument->getSerial(),
                    Blocks\Interfaces\Document::ISSUE => $identifierDocument->getIssue(),
                    Blocks\Interfaces\Document::ISSUE_DATE => $identifierDocument->getIssueDate(),
                    Blocks\Interfaces\Document::TERMIN => $identifierDocument->getTermin(),
                ])
            );
        }

        /** @var Blocks\Interfaces\Address $address */
        foreach ($credential->getAddresses() as $address) {
            $credentialElement->appendChild(
                $this->createFilledElement($address, [
                    Blocks\Interfaces\Address::LANGUAGE => $address->getLanguage(),
                    Blocks\Interfaces\Address::CREATED_AT => $address->getCreatedAt(),
                    Blocks\Interfaces\Address::TYPE => $address->getAddressType(),
                    Blocks\Interfaces\Address::AREA => $address->getArea(),
                    Blocks\Interfaces\Address::CITY => $address->getCity(),
                    Blocks\Interfaces\Address::CITY_TYPE => $address->getCityType(),
                    Blocks\Interfaces\Address::CORPUS => $address->getCorpus(),
                    Blocks\Interfaces\Address::COUNTRY => $address->getCountry(),
                    Blocks\Interfaces\Address::FLAT => $address->getFlat(),
                    Blocks\Interfaces\Address::FULL_ADDRESS => $address->getFullAddress(),
                    Blocks\Interfaces\Address::HOUSE => $address->getHouse(),
                    Blocks\Interfaces\Address::INDEX => $address->getIndex(),
                    Blocks\Interfaces\Address::STATE => $address->getState(),
                    Blocks\Interfaces\Address::STREET => $address->getStreet(),
                ])
            );
        }

        $photos = $credential->getPhotos();

        if (!is_null($photos) && !empty($photos)) {
            /** @var Blocks\Interfaces\Photo $photo */
            foreach ($photos as $photo) {
                $credentialElement->appendChild(
                    $this->createFilledElement($photo, [
                        Blocks\Interfaces\Photo::CREATED_AT => $photo->getCreatedAt(),
                        Blocks\Interfaces\Photo::INN => $photo->getInn(),
                        Blocks\Interfaces\Photo::PHOTO => $photo->getUri(),
                    ])
                );
            }
        }

        $identificationBlock->appendChild($credentialElement);
        // todo: before first block need add tech
        $ubkiData->appendChild($identificationBlock);

        $creditsInformation = $report->getCreditDeals();

        if (!is_null($creditsInformation)) {
            $creditDeals = $creditsInformation->getCreditCollection();

            if (!empty($creditDeals)) {
                $creditsBlock = $this->createBlockInformation($creditsInformation);

                /** @var Blocks\Interfaces\CreditDeal $creditDeal */
                foreach ($creditDeals as $creditDeal) {
                    $creditDealElement = $this->createFilledElement($creditDeal, [
                        Blocks\Interfaces\CreditDeal::TYPE => $creditDeal->getType(),
                        Blocks\Interfaces\CreditDeal::LANGUAGE => $creditDeal->getLanguage(),
                        Blocks\Interfaces\CreditDeal::ID => $creditDeal->getId(),
                        Blocks\Interfaces\CreditDeal::BIRTH_DATE => $creditDeal->getBirthDate(),
                        Blocks\Interfaces\CreditDeal::COLLATERAL => $creditDeal->getCollateral(),
                        Blocks\Interfaces\CreditDeal::COLLATERAL_COST => $creditDeal->getCollateralCost(),
                        Blocks\Interfaces\CreditDeal::CURRENCY => $creditDeal->getCurrency(),
                        Blocks\Interfaces\CreditDeal::FIRST_NAME => $creditDeal->getName(),
                        Blocks\Interfaces\CreditDeal::INITIAL_AMOUNT => $creditDeal->getInitialAmount(),
                        Blocks\Interfaces\CreditDeal::INN => $creditDeal->getInn(),
                        Blocks\Interfaces\CreditDeal::LAST_NAME => $creditDeal->getSurname(),
                        Blocks\Interfaces\CreditDeal::MIDDLE_NAME => $creditDeal->getPatronymic(),
                        Blocks\Interfaces\CreditDeal::REPAYMENT_PROCEDURE => $creditDeal->getRepaymentProcedure(),
                        Blocks\Interfaces\CreditDeal::SOURCE => $creditDeal->getSource(),
                        Blocks\Interfaces\CreditDeal::SUBJECT_ROLE => $creditDeal->getSubjectRole(),
                    ]);

                    /** @var Blocks\Interfaces\DealLife $dealLife */
                    foreach ($creditDeal->getDealLifeCollection() as $dealLife) {
                        $creditDealElement->appendChild(
                            $this->createFilledElement($dealLife, [
                                Blocks\Interfaces\DealLife::ID => $dealLife->getId(),
                                Blocks\Interfaces\DealLife::ISSUE_DATE => $dealLife->getIssueDate(),
                                Blocks\Interfaces\DealLife::ACTUAL_END_DATE => $dealLife->getActualEndDate(),
                                Blocks\Interfaces\DealLife::TRANCHE_INDICATION => $dealLife->getTrancheIndication(),
                                Blocks\Interfaces\DealLife::CURRENT_DEBT => $dealLife->getCurrentDebt(),
                                Blocks\Interfaces\DealLife::CURRENT_OVERDUE_DEBT => $dealLife->getCurrentOverdueDebt(),
                                Blocks\Interfaces\DealLife::DELAY_INDICATION => $dealLife->getDelayIndication(),
                                Blocks\Interfaces\DealLife::END_DATE => $dealLife->getEndDate(),
                                Blocks\Interfaces\DealLife::LIMIT => $dealLife->getLimit(),
                                Blocks\Interfaces\DealLife::MANDATORY_PAYMENT => $dealLife->getMandatoryPayment(),
                                Blocks\Interfaces\DealLife::OVERDUE_TIME => $dealLife->getOverdueTime(),
                                Blocks\Interfaces\DealLife::PAYMENT_DATE => $dealLife->getPaymentDate(),
                                Blocks\Interfaces\DealLife::PAYMENT_INDICATION => $dealLife->getPaymentIndication(),
                                Blocks\Interfaces\DealLife::PERIOD_MONTH => $dealLife->getPeriodMonth(),
                                Blocks\Interfaces\DealLife::PERIOD_YEAR => $dealLife->getPeriodYear(),
                                Blocks\Interfaces\DealLife::STATUS => $dealLife->getStatus(),
                            ])
                        );
                    }

                    $creditsBlock->appendChild($creditDealElement);
                }

                $ubkiData->appendChild($creditsBlock);
            }
        }

        $courtDecisionsInformation = $report->getCourtDecisions();

        if (!is_null($courtDecisionsInformation)) {
            $decisions = $courtDecisionsInformation->getDecisionCollection();

            if (!empty($decisions)) {
                $courtDecisionsBlock = $this->createBlockInformation($courtDecisionsInformation);

                /** @var Blocks\Interfaces\CourtDecision $decision */
                foreach ($decisions as $decision) {
                    $courtDecisionsBlock->appendChild(
                        $this->createFilledElement($decision, [
                            Blocks\Interfaces\CourtDecision::ID => $decision->getId(),
                            Blocks\Interfaces\CourtDecision::INN => $decision->getInn(),
                            Blocks\Interfaces\CourtDecision::AREA => $decision->getArea(),
                            Blocks\Interfaces\CourtDecision::CREATED_AT => $decision->getCreatedAt(),
                            Blocks\Interfaces\CourtDecision::COURT_NAME => $decision->getCourtDealType(),
                            Blocks\Interfaces\CourtDecision::COURT_DEAL_TYPE => $decision->getCourtDealType(),
                            Blocks\Interfaces\CourtDecision::DATE => $decision->getDate(),
                            Blocks\Interfaces\CourtDecision::DOCUMENT_TYPE => $decision->getDocumentType(),
                            Blocks\Interfaces\CourtDecision::LEGAL_FACT => $decision->getLegalFact(),
                            Blocks\Interfaces\CourtDecision::SUBJECT_STATUS => $decision->getSubjectStatus(),
                        ])
                    );
                }

                $ubkiData->appendChild($courtDecisionsBlock);
            }
        }

        $creditRequestInformation = $report->getCreditRequests();

        if (!is_null($creditRequestInformation)) {
            $creditRequests = $creditRequestInformation->getCreditRequests();

            if (!empty($creditRequests)) {
                $creditRequestsBlock = $this->createBlockInformation($creditRequestInformation);

                /** @var Blocks\Interfaces\CreditRegister $creditRequest */
                foreach ($creditRequests as $creditRequest) {
                    $creditRequestsBlock->appendChild(
                        $this->createFilledElement($creditRequest, [
                            Blocks\Interfaces\CreditRegister::DATE => $creditRequest->getDate(),
                            Blocks\Interfaces\CreditRegister::INN => $creditRequest->getInn(),
                            Blocks\Interfaces\CreditRegister::ID => $creditRequest->getId(),
                            Blocks\Interfaces\CreditRegister::DECISION => $creditRequest->getDecision(),
                            Blocks\Interfaces\CreditRegister::ORGANIZATION => $creditRequest->getOrganization(),
                            Blocks\Interfaces\CreditRegister::REASON => $creditRequest->getReason(),
                        ])
                    );
                }

                $registryTimes = $creditRequestInformation->getRegistryTimes();

                if (!is_null($registryTimes)) {
                    $creditRequestsBlock->appendChild(
                        $this->createFilledElement($registryTimes, [
                            Blocks\Interfaces\RegistryTimes::BY_HOUR => $registryTimes->getByHour(),
                            Blocks\Interfaces\RegistryTimes::BY_DAY => $registryTimes->getByDay(),
                            Blocks\Interfaces\RegistryTimes::BY_WEEK => $registryTimes->getByWeek(),
                            Blocks\Interfaces\RegistryTimes::BY_MONTH => $registryTimes->getByMonth(),
                            Blocks\Interfaces\RegistryTimes::BY_QUARTER => $registryTimes->getByQuarter(),
                            Blocks\Interfaces\RegistryTimes::BY_YEAR => $registryTimes->getByYear(),
                            Blocks\Interfaces\RegistryTimes::BY_MORE_YEAR => $registryTimes->getByMoreYear(),
                        ])
                    );
                }

                $ubkiData->appendChild($creditRequestsBlock);
            }
        }

        $insurancesInformation = $report->getInsuranceReports();

        if (!is_null($insurancesInformation)) {
            $insuranceReports = $insurancesInformation->getDeals();

            if (!empty($insuranceReports)) {
                $insurancesBlock = $this->createBlockInformation($insurancesInformation);

                /** @var Blocks\Interfaces\Insurance\Deal $insuranceDeal */
                foreach ($insuranceReports as $insuranceDeal) {
                    $insurancesBlock->appendChild(
                        $this->createFilledElement($insuranceDeal, [
                            Blocks\Interfaces\Insurance\Deal::ID => $insuranceDeal->getId(),
                            Blocks\Interfaces\Insurance\Deal::INN => $insuranceDeal->getInn(),
                            Blocks\Interfaces\Insurance\Deal::STATUS => $insuranceDeal->getStatus(),
                            Blocks\Interfaces\Insurance\Deal::END_DATE => $insuranceDeal->getEndDate(),
                            Blocks\Interfaces\Insurance\Deal::ACTUAL_END_DATE => $insuranceDeal->getActualEndDate(),
                            Blocks\Interfaces\Insurance\Deal::TYPE => $insuranceDeal->getType(),
                            Blocks\Interfaces\Insurance\Deal::INFORMATION_DATE => $insuranceDeal->getInformationDate(),
                            Blocks\Interfaces\Insurance\Deal::START_DATE => $insuranceDeal->getStartDate(),
                        ])
                    );
                }

                $ubkiData->appendChild($insurancesBlock);
            }
        }

        $contactsInformation = $report->getContacts();

        if (!is_null($contactsInformation)) {
            $contacts = $contactsInformation->getContacts();

            if (!empty($contacts)) {
                $contactsBlock = $this->createBlockInformation($contactsInformation);

                /** @var Blocks\Interfaces\Contact $contact */
                foreach ($contacts as $contact) {
                    $contactsBlock->appendChild(
                        $this->createFilledElement($contact, [
                            Blocks\Interfaces\Contact::TYPE => $contact->getType(),
                            Blocks\Interfaces\Contact::INN => $contact->getInn(),
                            Blocks\Interfaces\Contact::CREATED_AT => $contact->getCreatedAt(),
                            Blocks\Interfaces\Contact::VALUE => $contact->getValue(),
                        ])
                    );
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

    private function createBlockInformation(Block $class): \DOMElement
    {
        return $this->createFilledElement($class, [
            Block::ATTR_ID => $class->getId()
        ]);
    }

    private function createFilledElement(ElementInterface $class, array $attributes = []): \DOMElement
    {
        $element = $this->createElement($class);
        $this->setAttributesForElement($element, $attributes);

        return $element;
    }

    private function createElement(ElementInterface $class): \DOMElement
    {
        return $this->document->createElement($class->tag());
    }

    private function setAttributesForElement(\DOMElement &$element, array $attributes = []): void
    {
        foreach ($attributes as $name => $value) {
            if (!is_null($value)) {
                if ($value instanceof Reference) {
                    $element->setAttribute($name, $value->getValue());
                } elseif ($value instanceof \DateTimeInterface) {
                    $element->setAttribute($name, Carbon::instance($value)->toDateString());
                } else {
                    $element->setAttribute($name, $value);
                }
            }
        }
    }
}
