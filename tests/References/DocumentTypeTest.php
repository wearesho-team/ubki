<?php

namespace Wearesho\Bobra\Ubki\Tests\References;

use PHPUnit\Framework\TestCase;

use Wearesho\Bobra\Ubki\Rerefences\DocumentType;

/**
 * Class DocumentTypeTest
 * @package Wearesho\Bobra\Ubki\Tests\References
 * @coversDefaultClass DocumentType
 * @internal
 */
class DocumentTypeTest extends TestCase
{
    public function testTempCard(): void
    {
        $description = 'Временное удостоверение личности';
        $document = DocumentType::TEMP_CARD($description);
        $this->assertEquals(DocumentType::TEMP_CARD, $document->getValue());
        $this->assertEquals('TEMP_CARD', $document->getKey());
        $this->assertEquals($description, $document->getDescription());
    }

    public function testCitizen(): void
    {
        $description = 'Паспорт иностранного гражданина';
        $document = DocumentType::CITIZEN($description);
        $this->assertEquals(DocumentType::CITIZEN, $document->getValue());
        $this->assertEquals('CITIZEN', $document->getKey());
        $this->assertEquals($description, $document->getDescription());
    }

    public function testDiploma(): void
    {
        $description = 'Диплом';
        $document = DocumentType::DIPLOMA($description);
        $this->assertEquals(DocumentType::DIPLOMA, $document->getValue());
        $this->assertEquals('DIPLOMA', $document->getKey());
        $this->assertEquals($description, $document->getDescription());
    }

    public function testBirth(): void
    {
        $description = 'Свидетельство о рождении';
        $document = DocumentType::BIRTH($description);
        $this->assertEquals(DocumentType::BIRTH, $document->getValue());
        $this->assertEquals('BIRTH', $document->getKey());
        $this->assertEquals($description, $document->getDescription());
    }

    public function testStateRegistration(): void
    {
        $description = 'Свидетельство про государственную регистрацию';
        $document = DocumentType::STATE_REGISTRATION($description);
        $this->assertEquals(DocumentType::STATE_REGISTRATION, $document->getValue());
        $this->assertEquals('STATE_REGISTRATION', $document->getKey());
        $this->assertEquals($description, $document->getDescription());
    }

    public function testOrderingFromEgr(): void
    {
        $description = 'Выписка из ЕГР';
        $document = DocumentType::ORDERING_FROM_EGR($description);
        $this->assertEquals(DocumentType::ORDERING_FROM_EGR, $document->getValue());
        $this->assertEquals('ORDERING_FROM_EGR', $document->getKey());
        $this->assertEquals($description, $document->getDescription());
    }

    public function testResidence(): void
    {
        $description = 'Вид на постоянное жительство';
        $document = DocumentType::RESIDENCE($description);
        $this->assertEquals(DocumentType::RESIDENCE, $document->getValue());
        $this->assertEquals('RESIDENCE', $document->getKey());
        $this->assertEquals($description, $document->getDescription());
    }

    public function testInternational(): void
    {
        $description = 'Заграничный паспорт';
        $document = DocumentType::INTERNATIONAL($description);
        $this->assertEquals(DocumentType::INTERNATIONAL, $document->getValue());
        $this->assertEquals('INTERNATIONAL', $document->getKey());
        $this->assertEquals($description, $document->getDescription());
    }

    public function testMilitary(): void
    {
        $description = 'Военный билет';
        $document = DocumentType::MILITARY($description);
        $this->assertEquals(DocumentType::MILITARY, $document->getValue());
        $this->assertEquals('MILITARY', $document->getKey());
        $this->assertEquals($description, $document->getDescription());
    }

    public function testCertificateTaxpayers(): void
    {
        $description = 'Свидетельство про регистрацию плательщиков налогов';
        $document = DocumentType::CERTIFICATE_TAXPAYERS($description);
        $this->assertEquals(DocumentType::CERTIFICATE_TAXPAYERS, $document->getValue());
        $this->assertEquals('CERTIFICATE_TAXPAYERS', $document->getKey());
        $this->assertEquals($description, $document->getDescription());
    }

    public function testSeaman(): void
    {
        $description = 'Паспорт моряка';
        $document = DocumentType::SEAMAN($description);
        $this->assertEquals(DocumentType::SEAMAN, $document->getValue());
        $this->assertEquals('SEAMAN', $document->getKey());
        $this->assertEquals($description, $document->getDescription());
    }

    public function testAttestat(): void
    {
        $description = 'Аттестат';
        $document = DocumentType::ATTESTAT($description);
        $this->assertEquals(DocumentType::ATTESTAT, $document->getValue());
        $this->assertEquals('ATTESTAT', $document->getKey());
        $this->assertEquals($description, $document->getDescription());
    }

    public function testInformationTaxpayer(): void
    {
        $description = 'Справка про взятие на учет плательщика налогов';
        $document = DocumentType::INFORMATION_TAXPAYER($description);
        $this->assertEquals(DocumentType::INFORMATION_TAXPAYER, $document->getValue());
        $this->assertEquals('INFORMATION_TAXPAYER', $document->getKey());
        $this->assertEquals($description, $document->getDescription());
    }

    public function testUkraineCard(): void
    {
        $description = 'Паспорт гражданина Украины в виде ID карты';
        $document = DocumentType::UKRAINE_CARD($description);
        $this->assertEquals(DocumentType::UKRAINE_CARD, $document->getValue());
        $this->assertEquals('UKRAINE_CARD', $document->getKey());
        $this->assertEquals($description, $document->getDescription());
    }

    public function testDriver(): void
    {
        $description = 'Водительское удостоверение';
        $document = DocumentType::DRIVER($description);
        $this->assertEquals(DocumentType::DRIVER, $document->getValue());
        $this->assertEquals('DRIVER', $document->getKey());
        $this->assertEquals($description, $document->getDescription());
    }

    public function testExtractFromEgr(): void
    {
        $description = 'Выдержка из ЕГР';
        $document = DocumentType::EXTRACT_FROM_EGR($description);
        $this->assertEquals(DocumentType::EXTRACT_FROM_EGR, $document->getValue());
        $this->assertEquals('EXTRACT_FROM_EGR', $document->getKey());
        $this->assertEquals($description, $document->getDescription());
    }

    public function testPassport(): void
    {
        $description = 'Паспорт';
        $document = DocumentType::PASSPORT($description);
        $this->assertEquals(DocumentType::PASSPORT, $document->getValue());
        $this->assertEquals('PASSPORT', $document->getKey());
        $this->assertEquals($description, $document->getDescription());
    }
}
