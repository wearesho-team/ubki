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
        /** @var Ubki\Tests\Mocks\Language $language */
        $language = Ubki\Tests\Mocks\Language::EN($description);

        $this->assertEquals(Ubki\Tests\Mocks\Language::EN, $language->getValue());
        $this->assertEquals($description, $language->getDescription());
        $this->assertEquals(Ubki\Tests\Mocks\Language::EN()->getKey(), $language->getKey());
        $this->assertEquals('EN', $language->getKey());
    }

    /**
     * @expectedException \BadMethodCallException
     * @expectedExceptionMessage No static method or enum constant 'INVALID' in class
     *                           Wearesho\Bobra\Ubki\Tests\Mocks\Language
     */
    public function testInvalidConst(): void
    {
        $invalidType = 'INVALID';
        Ubki\Tests\Mocks\Language::{$invalidType}();
    }
}
