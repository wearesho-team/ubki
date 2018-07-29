<?php

namespace Wearesho\Bobra\Ubki\Tests\Data;

use Wearesho\Bobra\Ubki\Data\SubjectRole;

use PHPUnit\Framework\TestCase;

/**
 * class SubjectRoleTest
 * @package Wearesho\Bobra\Ubki\Tests\Data
 */
class SubjectRoleTest extends TestCase
{
    public function testGuarantor(): void
    {
        $description = 'Поручитель';
        $role = SubjectRole::GUARANTOR($description);
        $this->assertEquals(SubjectRole::GUARANTOR, $role->getValue());
        $this->assertEquals('GUARANTOR', $role->getKey());
        $this->assertEquals($description, $role->getDescription());
    }

    public function testPledgor(): void
    {
        $description = 'Залогодатель';
        $role = SubjectRole::PLEDGOR($description);
        $this->assertEquals(SubjectRole::PLEDGOR, $role->getValue());
        $this->assertEquals('PLEDGOR', $role->getKey());
        $this->assertEquals($description, $role->getDescription());
    }

    public function testBorrower(): void
    {
        $description = 'Заемщик';
        $role = SubjectRole::BORROWER($description);
        $this->assertEquals(SubjectRole::BORROWER, $role->getValue());
        $this->assertEquals('BORROWER', $role->getKey());
        $this->assertEquals($description, $role->getDescription());
    }
}
