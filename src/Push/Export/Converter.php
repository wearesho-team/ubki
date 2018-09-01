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
    public function xmlToDataDocument(string $xml): DataDocumentInterface
    {

    }

    public function xmlToResponse(string $xml): Response
    {

    }

    public function dataDocumentToXml(DataDocumentInterface $report): string
    {
        $document = new \DOMDocument('1.0', 'utf-8');

        $identification = $report->getIdentification();
        $identificationBlock = $this->createBlockInformation($identification);

        $credential = $identification->getCredential();
        $credentialElement = $this->createFilledDOMElement($credential, [
            'reqlng' => $credential->getLanguage(),
            Blocks\Interfaces\Credential::FIRST_NAME => $credential->getName(),
            Blocks\Interfaces\Credential::MIDDLE_NAME => $credential->getPatronymic(),
            Blocks\Interfaces\Credential::LAST_NAME => $credential->getSurname(),
            'bdate' => $credential->getBirthDate()
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

            $credentialElement->appendChild($this->createFilledDOMElement($identifier, $attributes));
        }

        $linkedPersons = $credential->getLinkedPersons();

        if (!is_null($linkedPersons) && !empty($linkedPersons)) {
            /** @var Blocks\Interfaces\LinkedPerson $linkedPerson */
            foreach ($linkedPersons as $linkedPerson) {
                $credentialElement->appendChild(
                    $this->createFilledDOMElement($linkedPerson, [
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
                    $this->createFilledDOMElement($work, [
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
                $this->createFilledDOMElement($identifierDocument, [
                    Blocks\Interfaces\Document::CREATED_AT => $identifierDocument->getCreatedAt(),
                    Blocks\Interfaces\Document::LANGUAGE => $identifierDocument->getLanguage(),
                    Blocks\Interfaces\Document::TYPE => $identifierDocument->getType(),
                    Blocks\Interfaces\Document::NUMBER => $identifierDocument->getNumber(),
                    Blocks\Interfaces\Document::SERIAL => $identifierDocument->getSerial(),
                    Blocks\Interfaces\Document::ISSUE_DATE => $identifierDocument->getIssueDate(),
                    Blocks\Interfaces\Document::TERMIN => $identifierDocument->getTermin(),
                ])
            );
        }

        /** @var Blocks\Interfaces\Address $address */
        foreach ($credential->getAddresses() as $address) {
            $credentialElement->appendChild(
                $this->createFilledDOMElement($address, [
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
                    $this->createFilledDOMElement($photo, [
                        Blocks\Interfaces\Photo::CREATED_AT => $photo->getCreatedAt(),
                        Blocks\Interfaces\Photo::INN => $photo->getInn(),
                        Blocks\Interfaces\Photo::PHOTO => $photo->getUri(),
                    ])
                );
            }
        }

        $identificationBlock->appendChild($credentialElement);

        $credits = $report->getCreditDeals();

        if (!is_null($credits) && !empty($credits)) {
            $creditsBlock = $this->createBlockInformation($credits);

            /** @var Blocks\Interfaces\CreditDeal $creditDeal */
            foreach ($credits->getCreditCollection() as $creditDeal) {
                $creditDealElement = $this->createFilledDOMElement($creditDeal, [
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
                        $this->createFilledDOMElement($dealLife, [
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
        }

        return $document->saveXML();
    }

    private function createBlockInformation(Block $class): \DOMElement
    {
        return $this->createFilledDOMElement($class, [
            Block::ATTR_ID => $class->getId()
        ]);
    }

    private function createFilledDOMElement(ElementInterface $class, array $attributes): \DOMElement
    {
        $element = $this->instanceDOMElement($class);
        $this->setAttributesForElement($element, $attributes);

        return $element;
    }

    private function instanceDOMElement(ElementInterface $class): \DOMElement
    {
        return new \DOMElement(call_user_func([$class, 'tag']));
    }

    private function setAttributesForElement(\DOMElement &$element, array $attributes): void
    {
        foreach ($attributes as $name => $value) {
            if (!is_null($value)) {
                if ($value instanceof Reference) {
                    $element->setAttribute($name, $value->getValue());
                } else if ($value instanceof \DateTimeInterface) {
                    $element->setAttribute($name, Carbon::instance($value)->toDateString());
                } else {
                    $element->setAttribute($name, $value);
                }
            }
        }
    }
}
