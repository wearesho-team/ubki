<?php

namespace Wearesho\Bobra\Ubki\Tests\Data;

use PHPUnit\Framework\TestCase;

use Wearesho\Bobra\Ubki\Data\FamilyStatus;

/**
 * Class FamilyStatusTest
 * @internal
 * @package Wearesho\Bobra\Ubki\Tests\Data
 */
class FamilyStatusTest extends TestCase
{
    public function testMarried()
    {
        $description = 'женат/замужем';
        $familyStatus = FamilyStatus::MARRIED($description);
        $this->assertEquals(FamilyStatus::MARRIED, $familyStatus->getValue());
        $this->assertEquals('MARRIED', $familyStatus->getKey());
        $this->assertEquals($description, $familyStatus->getDescription());
    }

    public function testCivil()
    {
        $description = 'в гражданском браке';
        $familyStatus = FamilyStatus::CIVIL($description);
        $this->assertEquals(FamilyStatus::CIVIL, $familyStatus->getValue());
        $this->assertEquals('CIVIL', $familyStatus->getKey());
        $this->assertEquals($description, $familyStatus->getDescription());
    }

    public function testWidow()
    {
        $description = 'вдовец/вдова';
        $familyStatus = FamilyStatus::WIDOW($description);
        $this->assertEquals(FamilyStatus::WIDOW, $familyStatus->getValue());
        $this->assertEquals('WIDOW', $familyStatus->getKey());
        $this->assertEquals($description, $familyStatus->getDescription());
    }

    public function testDivorced()
    {
        $description = 'разведен/разведена';
        $familyStatus = FamilyStatus::DIVORCED($description);
        $this->assertEquals(FamilyStatus::DIVORCED, $familyStatus->getValue());
        $this->assertEquals('DIVORCED', $familyStatus->getKey());
        $this->assertEquals($description, $familyStatus->getDescription());
    }

    public function testSingle()
    {
        $description = 'не женат/не замужем';
        $familyStatus = FamilyStatus::SINGLE($description);
        $this->assertEquals(FamilyStatus::SINGLE, $familyStatus->getValue());
        $this->assertEquals('SINGLE', $familyStatus->getKey());
        $this->assertEquals($description, $familyStatus->getDescription());
    }
}
