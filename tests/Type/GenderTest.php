<?php

namespace Wearesho\Bobra\Ubki\Tests\Type;

use Wearesho\Bobra\Ubki\Type\Gender;

use PHPUnit\Framework\TestCase;

/**
 * Class GenderTest
 * @internal
 * @package Wearesho\Bobra\Ubki\Tests\Type
 */
class GenderTest extends TestCase
{
    public function testWOMAN(): void
    {
        $description = 'Мужской';
        $gender = Gender::MAN($description);
        $this->assertEquals(Gender::MAN, $gender->getValue());
        $this->assertEquals('MAN', $gender->getKey());
        $this->assertEquals($description, $gender->getDescription());
    }

    public function testMAN(): void
    {
        $description = 'Женский';
        $gender = Gender::WOMAN($description);
        $this->assertEquals(Gender::WOMAN, $gender->getValue());
        $this->assertEquals('WOMAN', $gender->getKey());
        $this->assertEquals($description, $gender->getDescription());
    }
}
