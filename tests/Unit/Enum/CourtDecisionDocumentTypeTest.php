<?php

namespace Wearesho\Bobra\Ubki\Tests\Unit\Enum;

use PHPUnit\Framework\TestCase;
use Wearesho\Bobra\Ubki\Enum\CourtDecisionDocumentType;

/**
 * Class CourtDecisionDocumentTypeTest
 * @package Wearesho\Bobra\Ubki\Tests\Unit\Enum
 */
class CourtDecisionDocumentTypeTest extends TestCase
{
    public function testEnums(): void
    {
        $this->assertEquals(
            CourtDecisionDocumentType::COURT_DECISION(),
            new CourtDecisionDocumentType(CourtDecisionDocumentType::COURT_DECISION)
        );
        $this->assertEquals(
            CourtDecisionDocumentType::COURT_ORDER(),
            new CourtDecisionDocumentType(CourtDecisionDocumentType::COURT_ORDER)
        );
        $this->assertEquals(
            CourtDecisionDocumentType::DECISION(),
            new CourtDecisionDocumentType(CourtDecisionDocumentType::DECISION)
        );
        $this->assertEquals(
            CourtDecisionDocumentType::REGULATION(),
            new CourtDecisionDocumentType(CourtDecisionDocumentType::REGULATION)
        );
        $this->assertEquals(
            CourtDecisionDocumentType::SENTENCE(),
            new CourtDecisionDocumentType(CourtDecisionDocumentType::SENTENCE)
        );
        $this->assertEquals(
            CourtDecisionDocumentType::SEPARATE_SOLUTION(),
            new CourtDecisionDocumentType(CourtDecisionDocumentType::SEPARATE_SOLUTION)
        );
    }
}
