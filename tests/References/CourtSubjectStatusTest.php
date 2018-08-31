<?php

namespace Wearesho\Bobra\Ubki\Tests\References;

use Wearesho\Bobra\Ubki\References\CourtSubjectStatus;
use Wearesho\Bobra\Ubki\Tests\Extend\ReferenceTestCase;

/**
 * Class CourtSubjectStatusTest
 * @package Wearesho\Bobra\Ubki\Tests\References
 * @coversDefaultClass CourtSubjectStatus
 * @internal
 */
class CourtSubjectStatusTest extends ReferenceTestCase
{
    public function testThirdPersonWithRequirements(): void
    {
        $this->fakeReference = CourtSubjectStatus::THIRD_PERSON_WITH_REQUIREMENTS(static::DESCRIPTION);
        $this->assertEquals(
            CourtSubjectStatus::THIRD_PERSON_WITH_REQUIREMENTS(static::DESCRIPTION),
            $this->fakeReference
        );
    }

    public function testPlaintiff(): void
    {
        $this->fakeReference = CourtSubjectStatus::PLAINTIFF(static::DESCRIPTION);
        $this->assertEquals(
            CourtSubjectStatus::PLAINTIFF(static::DESCRIPTION),
            $this->fakeReference
        );
    }

    public function testRepresentative(): void
    {
        $this->fakeReference = CourtSubjectStatus::REPRESENTATIVE(static::DESCRIPTION);
        $this->assertEquals(
            CourtSubjectStatus::REPRESENTATIVE(static::DESCRIPTION),
            $this->fakeReference
        );
    }

    public function testDefendant(): void
    {
        $this->fakeReference = CourtSubjectStatus::DEFENDANT(static::DESCRIPTION);
        $this->assertEquals(
            CourtSubjectStatus::DEFENDANT(static::DESCRIPTION),
            $this->fakeReference
        );
    }

    public function testThirdPersonWithoutRequirements(): void
    {
        $this->fakeReference = CourtSubjectStatus::THIRD_PERSON_WITHOUT_REQUIREMENTS(static::DESCRIPTION);
        $this->assertEquals(
            CourtSubjectStatus::THIRD_PERSON_WITHOUT_REQUIREMENTS(static::DESCRIPTION),
            $this->fakeReference
        );
    }
}
