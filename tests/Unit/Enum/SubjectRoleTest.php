<?php

namespace Wearesho\Bobra\Ubki\Tests\Unit\Enum;

use PHPUnit\Framework\TestCase;
use Wearesho\Bobra\Ubki\Enum\SubjectRole;

/**
 * Class SubjectRoleTest
 * @package Wearesho\Bobra\Ubki\Tests\Unit\Enum
 */
class SubjectRoleTest extends TestCase
{
    public function testEnums(): void
    {
        $this->assertEquals(SubjectRole::GUARANTOR(), new SubjectRole(SubjectRole::GUARANTOR));
        $this->assertEquals(SubjectRole::PLEDGOR(), new SubjectRole(SubjectRole::PLEDGOR));
        $this->assertEquals(SubjectRole::BORROWER(), new SubjectRole(SubjectRole::BORROWER));
    }
}
