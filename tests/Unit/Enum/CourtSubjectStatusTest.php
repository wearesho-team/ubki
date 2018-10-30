<?php

namespace Wearesho\Bobra\Ubki\Tests\Unit\Enum;

use PHPUnit\Framework\TestCase;
use Wearesho\Bobra\Ubki\Enum\CourtSubjectStatus;

/**
 * Class CourtSubjectStatusTest
 * @package Wearesho\Bobra\Ubki\Tests\Unit\Enum
 */
class CourtSubjectStatusTest extends TestCase
{
    public function testEnums(): void
    {
        $this->assertEquals(CourtSubjectStatus::DEFENDANT(), new CourtSubjectStatus(CourtSubjectStatus::DEFENDANT));
        $this->assertEquals(CourtSubjectStatus::PLAINTIFF(), new CourtSubjectStatus(CourtSubjectStatus::PLAINTIFF));
        $this->assertEquals(
            CourtSubjectStatus::REPRESENTATIVE(),
            new CourtSubjectStatus(CourtSubjectStatus::REPRESENTATIVE)
        );
        $this->assertEquals(
            CourtSubjectStatus::THIRD_PERSON_WITH_REQUIREMENTS(),
            new CourtSubjectStatus(CourtSubjectStatus::THIRD_PERSON_WITH_REQUIREMENTS)
        );
        $this->assertEquals(
            CourtSubjectStatus::THIRD_PERSON_WITHOUT_REQUIREMENTS(),
            new CourtSubjectStatus(CourtSubjectStatus::THIRD_PERSON_WITHOUT_REQUIREMENTS)
        );
    }
}
