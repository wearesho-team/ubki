<?php

namespace Wearesho\Bobra\Ubki\Tests;

use PHPUnit\Framework\TestCase;

use Wearesho\Bobra\Ubki;

/**
 * Class ReferenceTest
 * @internal
 * @package Wearesho\Bobra\Ubki\Tests
 */
class ReferenceTest extends TestCase
{
    public function testInstance()
    {
        $language = Ubki\Enum\Language::ENG();

        $this->assertEquals(Ubki\Enum\Language::ENG, $language->getValue());
        $this->assertEquals(Ubki\Enum\Language::ENG()->getKey(), $language->getKey());
        $this->assertEquals('ENG', $language->getKey());
    }

    /**
     * @expectedException \BadMethodCallException
     * @expectedExceptionMessage No static method or enum constant 'BD' in class Wearesho\Bobra\Ubki\Enum\Language
     */
    public function testInvalidConst(): void
    {
        Ubki\Enum\Language::BD();
    }
}
