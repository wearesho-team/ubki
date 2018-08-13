<?php

namespace Wearesho\Bobra\Ubki\Tests\Data;

use Wearesho\Bobra\Ubki\Data\Flag;
use PHPUnit\Framework\TestCase;

/**
 * class FlagTest
 * @package Wearesho\Bobra\Ubki\Tests\Data
 */
class FlagTest extends TestCase
{
    public function testYes(): void
    {
        $description = 'да';
        $flag = Flag::YES($description);
        $this->assertEquals(Flag::YES, $flag->getValue());
        $this->assertEquals('YES', $flag->getKey());
        $this->assertEquals($description, $flag->getDescription());
    }

    public function testGuarantor(): void
    {
        $description = 'да, поручителем или 3-м лицом (для поля исполнение платежа)';
        $flag = Flag::GUARANTOR($description);
        $this->assertEquals(Flag::GUARANTOR, $flag->getValue());
        $this->assertEquals('GUARANTOR', $flag->getKey());
        $this->assertEquals($description, $flag->getDescription());
    }

    public function testNo(): void
    {
        $description = 'нет';
        $flag = Flag::NO($description);
        $this->assertEquals(Flag::NO, $flag->getValue());
        $this->assertEquals('NO', $flag->getKey());
        $this->assertEquals($description, $flag->getDescription());
    }

    public function testConsumer(): void
    {
        $description = 'Да (потребительский)';
        $flag = Flag::CONSUMER($description);
        $this->assertEquals(Flag::CONSUMER, $flag->getValue());
        $this->assertEquals('CONSUMER', $flag->getKey());
        $this->assertEquals($description, $flag->getDescription());
    }
}
