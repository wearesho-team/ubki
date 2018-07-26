<?php

namespace Wearesho\Bobra\Ubki\Tests\Data;

use Wearesho\Bobra\Ubki\Data\SocialStatus;

use PHPUnit\Framework\TestCase;

/**
 * Class SocialStatusTest
 * @internal
 * @package Wearesho\Bobra\Ubki\Tests\Data
 */
class SocialStatusTest extends TestCase
{

    public function testPensioner(): void
    {
        $description = 'пенсионер';
        $socialStatuc = SocialStatus::PENSIONER($description);
        $this->assertEquals(SocialStatus::PENSIONER, $socialStatuc->getValue());
        $this->assertEquals('PENSIONER', $socialStatuc->getKey());
        $this->assertEquals($description, $socialStatuc->getDescription());
    }

    public function testStudent(): void
    {
        $description = 'студент';
        $socialStatuc = SocialStatus::STUDENT($description);
        $this->assertEquals(SocialStatus::STUDENT, $socialStatuc->getValue());
        $this->assertEquals('STUDENT', $socialStatuc->getKey());
        $this->assertEquals($description, $socialStatuc->getDescription());
    }

    public function testTempUnemployed(): void
    {
        $description = 'временно не работающий';
        $socialStatuc = SocialStatus::TEMP_UNEMPLOYED($description);
        $this->assertEquals(SocialStatus::TEMP_UNEMPLOYED, $socialStatuc->getValue());
        $this->assertEquals('TEMP_UNEMPLOYED', $socialStatuc->getKey());
        $this->assertEquals($description, $socialStatuc->getDescription());
    }

    public function testPartTime(): void
    {
        $description = 'работающий неполный рабочий день';
        $socialStatuc = SocialStatus::PART_TIME($description);
        $this->assertEquals(SocialStatus::PART_TIME, $socialStatuc->getValue());
        $this->assertEquals('PART_TIME', $socialStatuc->getKey());
        $this->assertEquals($description, $socialStatuc->getDescription());
    }

    public function testMaternityLeave(): void
    {
        $description = 'декретный отпуск';
        $socialStatuc = SocialStatus::MATERNITY_LEAVE($description);
        $this->assertEquals(SocialStatus::MATERNITY_LEAVE, $socialStatuc->getValue());
        $this->assertEquals('MATERNITY_LEAVE', $socialStatuc->getKey());
        $this->assertEquals($description, $socialStatuc->getDescription());
    }

    public function testFullTime(): void
    {
        $description = 'работающий с полной занятостью';
        $socialStatuc = SocialStatus::FULL_TIME($description);
        $this->assertEquals(SocialStatus::FULL_TIME, $socialStatuc->getValue());
        $this->assertEquals('FULL_TIME', $socialStatuc->getKey());
        $this->assertEquals($description, $socialStatuc->getDescription());
    }

    public function testOther(): void
    {
        $description = 'прочее';
        $socialStatuc = SocialStatus::OTHER($description);
        $this->assertEquals(SocialStatus::OTHER, $socialStatuc->getValue());
        $this->assertEquals('OTHER', $socialStatuc->getKey());
        $this->assertEquals($description, $socialStatuc->getDescription());
    }

    public function testPensionerWork(): void
    {
        $description = 'работающий пенсионер';
        $socialStatuc = SocialStatus::PENSIONER_WORK($description);
        $this->assertEquals(SocialStatus::PENSIONER_WORK, $socialStatuc->getValue());
        $this->assertEquals('PENSIONER_WORK', $socialStatuc->getKey());
        $this->assertEquals($description, $socialStatuc->getDescription());
    }

    public function testTermTime(): void
    {
        $description = 'работающий по срочному контракту (сезонная работа)';
        $socialStatuc = SocialStatus::TERM_TIME($description);
        $this->assertEquals(SocialStatus::TERM_TIME, $socialStatuc->getValue());
        $this->assertEquals('TERM_TIME', $socialStatuc->getKey());
        $this->assertEquals($description, $socialStatuc->getDescription());
    }
}
