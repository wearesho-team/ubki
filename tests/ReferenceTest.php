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
        $description = 'English language';
        $language = Ubki\References\Language::ENG($description);

        $this->assertEquals(Ubki\References\Language::ENG, $language->getValue());
        $this->assertEquals($description, $language->getDescription());
        $this->assertEquals(Ubki\References\Language::ENG()->getKey(), $language->getKey());
        $this->assertEquals('ENG', $language->getKey());
    }

    /**
     * @expectedException \BadMethodCallException
     * @expectedExceptionMessage No static method or enum constant 'BD' in class Wearesho\Bobra\Ubki\References\Language
     */
    public function testInvalidConst(): void
    {
        Ubki\References\Language::BD();
    }
}
