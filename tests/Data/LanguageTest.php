<?php

namespace Wearesho\Bobra\Ubki\Tests\Data;

use PHPUnit\Framework\TestCase;

use Wearesho\Bobra\Ubki\Type;

/**
 * Class LanguageTest
 * @package Wearesho\Bobra\Ubki\Tests\Data
 */
class LanguageTest extends TestCase
{
    public function testValues(): void
    {
        $this->assertEquals(Type\Language::UA, Type\Language::UA()->getValue());
        $this->assertEquals(Type\Language::RU, Type\Language::RU()->getValue());
        $this->assertEquals(Type\Language::EN, Type\Language::EN()->getValue());
    }
}
