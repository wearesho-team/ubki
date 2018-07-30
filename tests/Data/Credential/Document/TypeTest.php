<?php

namespace Wearesho\Bobra\Ubki\Tests\Data\Credential\Document;

use PHPUnit\Framework\TestCase;

use Wearesho\Bobra\Ubki\Data\Credential\Document\Type;

/**
 * Class DocumentTest
 * @internal
 * @package Wearesho\Bobra\Ubki\Tests\Data\Credential\Document
 */
class TypeTest extends TestCase
{
    public function testTempCard(): void
    {
        $description = 'Временное удостоверение личности';
        $document = Type::TEMP_CARD($description);
        $this->assertEquals(Type::TEMP_CARD, $document->getValue());
        $this->assertEquals('TEMP_CARD', $document->getKey());
        $this->assertEquals($description, $document->getDescription());
    }

    public function testCitizen(): void
    {
        $description = 'Паспорт иностранного гражданина';
        $document = Type::CITIZEN($description);
        $this->assertEquals(Type::CITIZEN, $document->getValue());
        $this->assertEquals('CITIZEN', $document->getKey());
        $this->assertEquals($description, $document->getDescription());
    }

    public function testDiploma(): void
    {
        $description = 'Диплом';
        $document = Type::DIPLOMA($description);
        $this->assertEquals(Type::DIPLOMA, $document->getValue());
        $this->assertEquals('DIPLOMA', $document->getKey());
        $this->assertEquals($description, $document->getDescription());
    }

    public function testBirth(): void
    {
        $description = 'Свидетельство о рождении';
        $document = Type::BIRTH($description);
        $this->assertEquals(Type::BIRTH, $document->getValue());
        $this->assertEquals('BIRTH', $document->getKey());
        $this->assertEquals($description, $document->getDescription());
    }

    public function testStateRegistration(): void
    {
        $description = 'Свидетельство про государственную регистрацию';
        $document = Type::STATE_REGISTRATION($description);
        $this->assertEquals(Type::STATE_REGISTRATION, $document->getValue());
        $this->assertEquals('STATE_REGISTRATION', $document->getKey());
        $this->assertEquals($description, $document->getDescription());
    }

    public function testOrderingFromEgr(): void
    {
        $description = 'Выписка из ЕГР';
        $document = Type::ORDERING_FROM_EGR($description);
        $this->assertEquals(Type::ORDERING_FROM_EGR, $document->getValue());
        $this->assertEquals('ORDERING_FROM_EGR', $document->getKey());
        $this->assertEquals($description, $document->getDescription());
    }

    public function testResidence(): void
    {
        $description = 'Вид на постоянное жительство';
        $document = Type::RESIDENCE($description);
        $this->assertEquals(Type::RESIDENCE, $document->getValue());
        $this->assertEquals('RESIDENCE', $document->getKey());
        $this->assertEquals($description, $document->getDescription());
    }

    public function testInternational(): void
    {
        $description = 'Заграничный паспорт';
        $document = Type::INTERNATIONAL($description);
        $this->assertEquals(Type::INTERNATIONAL, $document->getValue());
        $this->assertEquals('INTERNATIONAL', $document->getKey());
        $this->assertEquals($description, $document->getDescription());
    }

    public function testMilitary(): void
    {
        $description = 'Военный билет';
        $document = Type::MILITARY($description);
        $this->assertEquals(Type::MILITARY, $document->getValue());
        $this->assertEquals('MILITARY', $document->getKey());
        $this->assertEquals($description, $document->getDescription());
    }

    public function testCertificateTaxpayers(): void
    {
        $description = 'Свидетельство про регистрацию плательщиков налогов';
        $document = Type::CERTIFICATE_TAXPAYERS($description);
        $this->assertEquals(Type::CERTIFICATE_TAXPAYERS, $document->getValue());
        $this->assertEquals('CERTIFICATE_TAXPAYERS', $document->getKey());
        $this->assertEquals($description, $document->getDescription());
    }

    public function testSeaman(): void
    {
        $description = 'Паспорт моряка';
        $document = Type::SEAMAN($description);
        $this->assertEquals(Type::SEAMAN, $document->getValue());
        $this->assertEquals('SEAMAN', $document->getKey());
        $this->assertEquals($description, $document->getDescription());
    }

    public function testAttestat(): void
    {
        $description = 'Аттестат';
        $document = Type::ATTESTAT($description);
        $this->assertEquals(Type::ATTESTAT, $document->getValue());
        $this->assertEquals('ATTESTAT', $document->getKey());
        $this->assertEquals($description, $document->getDescription());
    }

    public function testInformationTaxpayer(): void
    {
        $description = 'Справка про взятие на учет плательщика налогов';
        $document = Type::INFORMATION_TAXPAYER($description);
        $this->assertEquals(Type::INFORMATION_TAXPAYER, $document->getValue());
        $this->assertEquals('INFORMATION_TAXPAYER', $document->getKey());
        $this->assertEquals($description, $document->getDescription());
    }

    public function testUkraineCard(): void
    {
        $description = 'Паспорт гражданина Украины в виде ID карты';
        $document = Type::UKRAINE_CARD($description);
        $this->assertEquals(Type::UKRAINE_CARD, $document->getValue());
        $this->assertEquals('UKRAINE_CARD', $document->getKey());
        $this->assertEquals($description, $document->getDescription());
    }

    public function testDriver(): void
    {
        $description = 'Водительское удостоверение';
        $document = Type::DRIVER($description);
        $this->assertEquals(Type::DRIVER, $document->getValue());
        $this->assertEquals('DRIVER', $document->getKey());
        $this->assertEquals($description, $document->getDescription());
    }

    public function testExtractFromEgr(): void
    {
        $description = 'Выдержка из ЕГР';
        $document = Type::EXTRACT_FROM_EGR($description);
        $this->assertEquals(Type::EXTRACT_FROM_EGR, $document->getValue());
        $this->assertEquals('EXTRACT_FROM_EGR', $document->getKey());
        $this->assertEquals($description, $document->getDescription());
    }

    public function testPassport(): void
    {
        $description = 'Паспорт';
        $document = Type::PASSPORT($description);
        $this->assertEquals(Type::PASSPORT, $document->getValue());
        $this->assertEquals('PASSPORT', $document->getKey());
        $this->assertEquals($description, $document->getDescription());
    }
}
