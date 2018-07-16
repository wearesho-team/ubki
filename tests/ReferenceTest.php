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
        $language = Ubki\Language::EN($description);

        $this->assertEquals(Ubki\Language::EN, $language->getValue());
        $this->assertEquals($description, $language->getDescription());
        $this->assertEquals(Ubki\Language::EN()->getKey(), $language->getKey());
        $this->assertEquals('EN', $language->getKey());
    }

    /**
     * @expectedException \BadMethodCallException
     * @expectedExceptionMessage No static method or enum constant 'BD' in class Wearesho\Bobra\Ubki\Language
     */
    public function testInvalidConst(): void
    {
        Ubki\Language::BD();
    }
}
