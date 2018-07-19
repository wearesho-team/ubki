<?php

namespace Wearesho\Bobra\Ubki\Tests\Type;

use Wearesho\Bobra\Ubki\Type\Document;
use PHPUnit\Framework\TestCase;

/**
 * Class DocumentTest
 * @internal
 * @package Wearesho\Bobra\Ubki\Tests\Type
 */
class DocumentTest extends TestCase
{
    public function testTempCard(): void
    {
        $description = 'Временное удостоверение личности';
        $document = Document::TEMP_CARD($description);
        $this->assertEquals(Document::TEMP_CARD, $document->getValue());
        $this->assertEquals('TEMP_CARD', $document->getKey());
        $this->assertEquals($description, $document->getDescription());
    }

    public function testCitizen(): void
    {
        $description = 'Паспорт иностранного гражданина';
        $document = Document::CITIZEN($description);
        $this->assertEquals(Document::CITIZEN, $document->getValue());
        $this->assertEquals('CITIZEN', $document->getKey());
        $this->assertEquals($description, $document->getDescription());
    }

    public function testDiploma(): void
    {
        $description = 'Диплом';
        $document = Document::DIPLOMA($description);
        $this->assertEquals(Document::DIPLOMA, $document->getValue());
        $this->assertEquals('DIPLOMA', $document->getKey());
        $this->assertEquals($description, $document->getDescription());
    }

    public function testBirth(): void
    {
        $description = 'Свидетельство о рождении';
        $document = Document::BIRTH($description);
        $this->assertEquals(Document::BIRTH, $document->getValue());
        $this->assertEquals('BIRTH', $document->getKey());
        $this->assertEquals($description, $document->getDescription());
    }

    public function testStateRegistration(): void
    {
        $description = 'Свидетельство про государственную регистрацию';
        $document = Document::STATE_REGISTRATION($description);
        $this->assertEquals(Document::STATE_REGISTRATION, $document->getValue());
        $this->assertEquals('STATE_REGISTRATION', $document->getKey());
        $this->assertEquals($description, $document->getDescription());
    }

    public function testOrderingFromEgr(): void
    {
        $description = 'Выписка из ЕГР';
        $document = Document::ORDERING_FROM_EGR($description);
        $this->assertEquals(Document::ORDERING_FROM_EGR, $document->getValue());
        $this->assertEquals('ORDERING_FROM_EGR', $document->getKey());
        $this->assertEquals($description, $document->getDescription());
    }

    public function testResidence(): void
    {
        $description = 'Вид на постоянное жительство';
        $document = Document::RESIDENCE($description);
        $this->assertEquals(Document::RESIDENCE, $document->getValue());
        $this->assertEquals('RESIDENCE', $document->getKey());
        $this->assertEquals($description, $document->getDescription());
    }

    public function testInternational(): void
    {
        $description = 'Заграничный паспорт';
        $document = Document::INTERNATIONAL($description);
        $this->assertEquals(Document::INTERNATIONAL, $document->getValue());
        $this->assertEquals('INTERNATIONAL', $document->getKey());
        $this->assertEquals($description, $document->getDescription());
    }

    public function testMilitary(): void
    {
        $description = 'Военный билет';
        $document = Document::MILITARY($description);
        $this->assertEquals(Document::MILITARY, $document->getValue());
        $this->assertEquals('MILITARY', $document->getKey());
        $this->assertEquals($description, $document->getDescription());
    }

    public function testCertificateTaxpayers(): void
    {
        $description = 'Свидетельство про регистрацию плательщиков налогов';
        $document = Document::CERTIFICATE_TAXPAYERS($description);
        $this->assertEquals(Document::CERTIFICATE_TAXPAYERS, $document->getValue());
        $this->assertEquals('CERTIFICATE_TAXPAYERS', $document->getKey());
        $this->assertEquals($description, $document->getDescription());
    }

    public function testSeaman(): void
    {
        $description = 'Паспорт моряка';
        $document = Document::SEAMAN($description);
        $this->assertEquals(Document::SEAMAN, $document->getValue());
        $this->assertEquals('SEAMAN', $document->getKey());
        $this->assertEquals($description, $document->getDescription());
    }

    public function testAttestat(): void
    {
        $description = 'Аттестат';
        $document = Document::ATTESTAT($description);
        $this->assertEquals(Document::ATTESTAT, $document->getValue());
        $this->assertEquals('ATTESTAT', $document->getKey());
        $this->assertEquals($description, $document->getDescription());
    }

    public function testInformationTaxpayer(): void
    {
        $description = 'Справка про взятие на учет плательщика налогов';
        $document = Document::INFORMATION_TAXPAYER($description);
        $this->assertEquals(Document::INFORMATION_TAXPAYER, $document->getValue());
        $this->assertEquals('INFORMATION_TAXPAYER', $document->getKey());
        $this->assertEquals($description, $document->getDescription());
    }

    public function testUkraineCard(): void
    {
        $description = 'Паспорт гражданина Украины в виде ID карты';
        $document = Document::UKRAINE_CARD($description);
        $this->assertEquals(Document::UKRAINE_CARD, $document->getValue());
        $this->assertEquals('UKRAINE_CARD', $document->getKey());
        $this->assertEquals($description, $document->getDescription());
    }

    public function testDriver(): void
    {
        $description = 'Водительское удостоверение';
        $document = Document::DRIVER($description);
        $this->assertEquals(Document::DRIVER, $document->getValue());
        $this->assertEquals('DRIVER', $document->getKey());
        $this->assertEquals($description, $document->getDescription());
    }

    public function testExtractFromEgr(): void
    {
        $description = 'Выдержка из ЕГР';
        $document = Document::EXTRACT_FROM_EGR($description);
        $this->assertEquals(Document::EXTRACT_FROM_EGR, $document->getValue());
        $this->assertEquals('EXTRACT_FROM_EGR', $document->getKey());
        $this->assertEquals($description, $document->getDescription());
    }

    public function testPassport(): void
    {
        $description = 'Паспорт';
        $document = Document::PASSPORT($description);
        $this->assertEquals(Document::PASSPORT, $document->getValue());
        $this->assertEquals('PASSPORT', $document->getKey());
        $this->assertEquals($description, $document->getDescription());
    }
}
