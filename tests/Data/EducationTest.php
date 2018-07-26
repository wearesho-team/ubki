<?php

namespace Wearesho\Bobra\Ubki\Tests\Data;

use Wearesho\Bobra\Ubki\Data\Education;

use PHPUnit\Framework\TestCase;

/**
 * Class EducationTest
 * @internal
 * @package Wearesho\Bobra\Ubki\Tests\Data
 */
class EducationTest extends TestCase
{
    public function testSecondary(): void
    {
        $description = 'среднее';
        $educationType = Education::SECONDARY($description);
        $this->assertEquals(Education::SECONDARY, $educationType->getValue());
        $this->assertEquals('SECONDARY', $educationType->getKey());
        $this->assertEquals($description, $educationType->getDescription());
    }

    public function testSelf(): void
    {
        $description = 'самообразование';
        $educationType = Education::SELF($description);
        $this->assertEquals(Education::SELF, $educationType->getValue());
        $this->assertEquals('SELF', $educationType->getKey());
        $this->assertEquals($description, $educationType->getDescription());
    }

    public function testSecondaryTech(): void
    {
        $description = 'среднее техническое';
        $educationType = Education::SECONDARY_TECH($description);
        $this->assertEquals(Education::SECONDARY_TECH, $educationType->getValue());
        $this->assertEquals('SECONDARY_TECH', $educationType->getKey());
        $this->assertEquals($description, $educationType->getDescription());
    }

    public function testHigh(): void
    {
        $description = 'высшее';
        $educationType = Education::HIGH($description);
        $this->assertEquals(Education::HIGH, $educationType->getValue());
        $this->assertEquals('HIGH', $educationType->getKey());
        $this->assertEquals($description, $educationType->getDescription());
    }

    public function testSecondaryUnfinished(): void
    {
        $description = 'неоконченное среднее';
        $educationType = Education::SECONDARY_UNFINISHED($description);
        $this->assertEquals(Education::SECONDARY_UNFINISHED, $educationType->getValue());
        $this->assertEquals('SECONDARY_UNFINISHED', $educationType->getKey());
        $this->assertEquals($description, $educationType->getDescription());
    }

    public function testAcademic(): void
    {
        $description = 'научная степень';
        $educationType = Education::ACADEMIC($description);
        $this->assertEquals(Education::ACADEMIC, $educationType->getValue());
        $this->assertEquals('ACADEMIC', $educationType->getKey());
        $this->assertEquals($description, $educationType->getDescription());
    }

    public function testHighUnfinished(): void
    {
        $description = 'неоконченное высшее';
        $educationType = Education::HIGH_UNFINISHED($description);
        $this->assertEquals(Education::HIGH_UNFINISHED, $educationType->getValue());
        $this->assertEquals('HIGH_UNFINISHED', $educationType->getKey());
        $this->assertEquals($description, $educationType->getDescription());
    }
}
