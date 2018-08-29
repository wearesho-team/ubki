<?php

namespace Wearesho\Bobra\Ubki\Tests\References;

use Wearesho\Bobra\Ubki\References\SubjectRole;
use Wearesho\Bobra\Ubki\Tests\Extend\ReferenceTestCase;

/**
 * Class SubjectRoleTest
 * @package Wearesho\Bobra\Ubki\Tests\References
 * @coversDefaultClass SubjectRole
 * @internal
 */
class SubjectRoleTest extends ReferenceTestCase
{
    public function testPledgor(): void
    {
        $this->fakeReference = SubjectRole::PLEDGOR(static::DESCRIPTION);
        $this->assertEquals(
            SubjectRole::PLEDGOR(static::DESCRIPTION),
            $this->fakeReference
        );
    }

    public function testBorrower(): void
    {
        $this->fakeReference = SubjectRole::BORROWER(static::DESCRIPTION);
        $this->assertEquals(
            SubjectRole::BORROWER(static::DESCRIPTION),
            $this->fakeReference
        );
    }

    public function testGuarantor(): void
    {
        $this->fakeReference = SubjectRole::GUARANTOR(static::DESCRIPTION);
        $this->assertEquals(
            SubjectRole::GUARANTOR(static::DESCRIPTION),
            $this->fakeReference
        );
    }
}
