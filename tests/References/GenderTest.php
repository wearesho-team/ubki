<?php

namespace Wearesho\Bobra\Ubki\Tests\References;

use Wearesho\Bobra\Ubki\References\Gender;

use PHPUnit\Framework\TestCase;

/**
 * Class GenderTest
 * @package Wearesho\Bobra\Ubki\Tests\References
 * @coversDefaultClass \Wearesho\Bobra\Ubki\References\Gender
 * @internal
 */
class GenderTest extends TestCase
{
    public function testWoman(): void
    {
        $description = 'Мужской';
        $gender = Gender::MAN($description);
        $this->assertEquals(Gender::MAN, $gender->getValue());
        $this->assertEquals('MAN', $gender->getKey());
        $this->assertEquals($description, $gender->getDescription());
    }

    public function testMan(): void
    {
        $description = 'Женский';
        $gender = Gender::WOMAN($description);
        $this->assertEquals(Gender::WOMAN, $gender->getValue());
        $this->assertEquals('WOMAN', $gender->getKey());
        $this->assertEquals($description, $gender->getDescription());
    }
}
