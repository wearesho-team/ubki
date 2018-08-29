<?php

namespace Wearesho\Bobra\Ubki\Tests\References;

use Wearesho\Bobra\Ubki\References\DocumentType;
use Wearesho\Bobra\Ubki\Tests\Extend\ReferenceTestCase;

/**
 * Class DocumentTypeTest
 * @package Wearesho\Bobra\Ubki\Tests\References
 * @coversDefaultClass DocumentType
 * @internal
 */
class DocumentTypeTest extends ReferenceTestCase
{
    public function testStateRegistration(): void
    {
        $this->fakeReference = DocumentType::STATE_REGISTRATION(static::DESCRIPTION);
        $this->assertEquals(
            DocumentType::STATE_REGISTRATION(static::DESCRIPTION),
            $this->fakeReference
        );
    }

    public function testExtractFromEgr(): void
    {
        $this->fakeReference = DocumentType::EXTRACT_FROM_EGR(static::DESCRIPTION);
        $this->assertEquals(
            DocumentType::EXTRACT_FROM_EGR(static::DESCRIPTION),
            $this->fakeReference
        );
    }

    public function testTempCard(): void
    {
        $this->fakeReference = DocumentType::TEMP_CARD(static::DESCRIPTION);
        $this->assertEquals(
            DocumentType::TEMP_CARD(static::DESCRIPTION),
            $this->fakeReference
        );
    }

    public function testAttestat(): void
    {
        $this->fakeReference = DocumentType::ATTESTAT(static::DESCRIPTION);
        $this->assertEquals(
            DocumentType::ATTESTAT(static::DESCRIPTION),
            $this->fakeReference
        );
    }

    public function testSeaman(): void
    {
        $this->fakeReference = DocumentType::SEAMAN(static::DESCRIPTION);
        $this->assertEquals(
            DocumentType::SEAMAN(static::DESCRIPTION),
            $this->fakeReference
        );
    }

    public function testInternational(): void
    {
        $this->fakeReference = DocumentType::INTERNATIONAL(static::DESCRIPTION);
        $this->assertEquals(
            DocumentType::INTERNATIONAL(static::DESCRIPTION),
            $this->fakeReference
        );
    }

    public function testInformationTaxpayer(): void
    {
        $this->fakeReference = DocumentType::INFORMATION_TAXPAYER(static::DESCRIPTION);
        $this->assertEquals(
            DocumentType::INFORMATION_TAXPAYER(static::DESCRIPTION),
            $this->fakeReference
        );
    }

    public function testMilitary(): void
    {
        $this->fakeReference = DocumentType::MILITARY(static::DESCRIPTION);
        $this->assertEquals(
            DocumentType::MILITARY(static::DESCRIPTION),
            $this->fakeReference
        );
    }

    public function testDriver(): void
    {
        $this->fakeReference = DocumentType::DRIVER(static::DESCRIPTION);
        $this->assertEquals(
            DocumentType::DRIVER(static::DESCRIPTION),
            $this->fakeReference
        );
    }

    public function testResidence(): void
    {
        $this->fakeReference = DocumentType::RESIDENCE(static::DESCRIPTION);
        $this->assertEquals(
            DocumentType::RESIDENCE(static::DESCRIPTION),
            $this->fakeReference
        );
    }

    public function testBirth(): void
    {
        $this->fakeReference = DocumentType::BIRTH(static::DESCRIPTION);
        $this->assertEquals(
            DocumentType::BIRTH(static::DESCRIPTION),
            $this->fakeReference
        );
    }

    public function testCertificateTaxpayers(): void
    {
        $this->fakeReference = DocumentType::CERTIFICATE_TAXPAYERS(static::DESCRIPTION);
        $this->assertEquals(
            DocumentType::CERTIFICATE_TAXPAYERS(static::DESCRIPTION),
            $this->fakeReference
        );
    }

    public function testPassport(): void
    {
        $this->fakeReference = DocumentType::PASSPORT(static::DESCRIPTION);
        $this->assertEquals(
            DocumentType::PASSPORT(static::DESCRIPTION),
            $this->fakeReference
        );
    }

    public function testOrderingFromEgr(): void
    {
        $this->fakeReference = DocumentType::ORDERING_FROM_EGR(static::DESCRIPTION);
        $this->assertEquals(
            DocumentType::ORDERING_FROM_EGR(static::DESCRIPTION),
            $this->fakeReference
        );
    }

    public function testUkraineCard(): void
    {
        $this->fakeReference = DocumentType::UKRAINE_CARD(static::DESCRIPTION);
        $this->assertEquals(
            DocumentType::UKRAINE_CARD(static::DESCRIPTION),
            $this->fakeReference
        );
    }

    public function testCitizen(): void
    {
        $this->fakeReference = DocumentType::CITIZEN(static::DESCRIPTION);
        $this->assertEquals(
            DocumentType::CITIZEN(static::DESCRIPTION),
            $this->fakeReference
        );
    }

    public function testDiploma(): void
    {
        $this->fakeReference = DocumentType::DIPLOMA(static::DESCRIPTION);
        $this->assertEquals(
            DocumentType::DIPLOMA(static::DESCRIPTION),
            $this->fakeReference
        );
    }
}
