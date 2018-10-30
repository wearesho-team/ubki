<?php

namespace Wearesho\Bobra\Ubki\Tests\Unit\Enum;

use PHPUnit\Framework\TestCase;
use Wearesho\Bobra\Ubki\Enum\DocumentType;

/**
 * Class DocumentTypeTest
 * @package Wearesho\Bobra\Ubki\Tests\Unit\Enum
 */
class DocumentTypeTest extends TestCase
{
    public function testEnums(): void
    {
        $this->assertEquals(DocumentType::PASSPORT(), new DocumentType(DocumentType::PASSPORT));
        $this->assertEquals(DocumentType::ATTESTAT(), new DocumentType(DocumentType::ATTESTAT));
        $this->assertEquals(DocumentType::BIRTH(), new DocumentType(DocumentType::BIRTH));
        $this->assertEquals(DocumentType::CITIZEN(), new DocumentType(DocumentType::CITIZEN));
        $this->assertEquals(DocumentType::DIPLOMA(), new DocumentType(DocumentType::DIPLOMA));
        $this->assertEquals(DocumentType::DRIVER(), new DocumentType(DocumentType::DRIVER));
        $this->assertEquals(DocumentType::EXTRACT_FROM_EGR(), new DocumentType(DocumentType::EXTRACT_FROM_EGR));
        $this->assertEquals(DocumentType::INFORMATION_TAXPAYER(), new DocumentType(DocumentType::INFORMATION_TAXPAYER));
        $this->assertEquals(DocumentType::INTERNATIONAL(), new DocumentType(DocumentType::INTERNATIONAL));
        $this->assertEquals(DocumentType::MILITARY(), new DocumentType(DocumentType::MILITARY));
        $this->assertEquals(DocumentType::ORDERING_FROM_EGR(), new DocumentType(DocumentType::ORDERING_FROM_EGR));
        $this->assertEquals(DocumentType::RESIDENCE(), new DocumentType(DocumentType::RESIDENCE));
        $this->assertEquals(DocumentType::SEAMAN(), new DocumentType(DocumentType::SEAMAN));
        $this->assertEquals(DocumentType::STATE_REGISTRATION(), new DocumentType(DocumentType::STATE_REGISTRATION));
        $this->assertEquals(DocumentType::TEMP_CARD(), new DocumentType(DocumentType::TEMP_CARD));
        $this->assertEquals(DocumentType::UKRAINE_CARD(), new DocumentType(DocumentType::UKRAINE_CARD));
        $this->assertEquals(
            DocumentType::CERTIFICATE_TAXPAYERS(),
            new DocumentType(DocumentType::CERTIFICATE_TAXPAYERS)
        );
    }
}
