<?php

namespace Wearesho\Bobra\Ubki\Push\Export;

use Carbon\Carbon;

use Wearesho\Bobra\Ubki\Block;
use Wearesho\Bobra\Ubki\Blocks\Identification;
use Wearesho\Bobra\Ubki\Blocks\Interfaces;
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

        $identificationBlock = $document->createElement(Block::TAG);
        $identificationBlock->setAttribute(Block::ATTR_ID, Identification::ID);

        $credential = $identification->getCredential();
        $credentialElement = $document->createElement(Interfaces\Credential::TAG);
        $this->setAttributesForElement($credentialElement, [
            'reqlng' => $credential->getLanguage(),
            Interfaces\Credential::FIRST_NAME => $credential->getName(),
            Interfaces\Credential::MIDDLE_NAME => $credential->getPatronymic(),
            Interfaces\Credential::LAST_NAME => $credential->getSurname(),
            'bdate' => $credential->getBirthDate()
        ]);

        /** @var Interfaces\Identifier $identifier */
        foreach ($credential->getIdentifiers() as $identifier) {
            if ($identifier instanceof Interfaces\NaturalIdentifier) {
                $identifierElement = $document->createElement(Interfaces\NaturalIdentifier::TAG);
                $this->setAttributesForElement($identifierElement, [
                    Interfaces\NaturalIdentifier::NAME => $identifier->getName(),
                    Interfaces\NaturalIdentifier::MIDDLE_NAME => $identifier->getPatronymic(),
                    Interfaces\NaturalIdentifier::LAST_NAME => $identifier->getSurname(),
                    Interfaces\NaturalIdentifier::INN => $identifier->getInn(),
                    Interfaces\NaturalIdentifier::BIRTH_DATE => $identifier->getBirthDate(),
                    Interfaces\NaturalIdentifier::CREATED_AT => $identifier->getCreatedAt(),
                    Interfaces\NaturalIdentifier::CHILDREN_COUNT => $identifier->getChildrenCount(),
                    Interfaces\NaturalIdentifier::LANGUAGE => $identifier->getLanguage(),
                    Interfaces\NaturalIdentifier::EDUCATION => $identifier->getEducation(),
                    Interfaces\NaturalIdentifier::FAMILY_STATUS => $identifier->getFamilyStatus(),
                    Interfaces\NaturalIdentifier::GENDER => $identifier->getGender(),
                    Interfaces\NaturalIdentifier::NATIONALITY => $identifier->getNationality(),
                    Interfaces\NaturalIdentifier::REGISTRATION_SPD => $identifier->getRegistrationSpd(),
                    Interfaces\NaturalIdentifier::SOCIAL_STATUS => $identifier->getSocialStatus(),
                ]);
            } else {
                /** @var Interfaces\LegalIdentifier $identifier */
                $identifierElement = $document->createElement(Interfaces\LegalIdentifier::TAG);
                $this->setAttributesForElement($identifierElement, [
                    Interfaces\LegalIdentifier::LANGUAGE => $identifier->getLanguage(),
                    Interfaces\LegalIdentifier::CREATED_AT => $identifier->getCreatedAt(),
                    Interfaces\LegalIdentifier::NAME => $identifier->getName(),
                    Interfaces\LegalIdentifier::TAX_REGISTRATION_DATE => $identifier->getTaxRegistrationDate(),
                    Interfaces\LegalIdentifier::EDR_REGISTRATION_DATE => $identifier->getEdrRegistrationDate(),
                    Interfaces\LegalIdentifier::ECONOMY_BRANCH => $identifier->getEconomyBranch(),
                    Interfaces\LegalIdentifier::ACTIVITY_TYPE => $identifier->getActivityType(),
                    Interfaces\LegalIdentifier::ERGPOU => $identifier->getErgpou(),
                    Interfaces\LegalIdentifier::FORM => $identifier->getForm(),
                ]);
            }

            $credentialElement->appendChild($identifierElement);
        }

        /** @var Interfaces\Document $identifierDocument */
        foreach ($credential->getDocuments() as $identifierDocument) {
            $identifierDocumentElement = $document->createElement(Interfaces\Document::TAG);
            $this->setAttributesForElement($identifierDocumentElement, [
                Interfaces\Document::CREATED_AT => $identifierDocument->getCreatedAt(),
                Interfaces\Document::LANGUAGE => $identifierDocument->getLanguage(),
                Interfaces\Document::TYPE => $identifierDocument->getType(),
                Interfaces\Document::NUMBER => $identifierDocument->getNumber(),
                Interfaces\Document::SERIAL => $identifierDocument->getSerial(),
                Interfaces\Document::ISSUE_DATE => $identifierDocument->getIssueDate(),
                Interfaces\Document::TERMIN => $identifierDocument->getTermin(),
            ]);
            $credentialElement->appendChild($identifierDocumentElement);
        }

        /** @var Interfaces\Photo $photo */
        foreach ($credential->getPhotos() as $photo) {
            $photoElement = $document->createElement(Interfaces\Photo::TAG);
            $this->setAttributesForElement($photoElement, [
                Interfaces\Photo::CREATED_AT => $photo->getCreatedAt(),
                Interfaces\Photo::INN => $photo->getInn(),
                Interfaces\Photo::PHOTO => $photo->getUri()
            ]);
            $credentialElement->appendChild($photoElement);
        }

        return $document->saveXML();
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
