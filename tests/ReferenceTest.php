<?php

namespace Wearesho\Bobra\Ubki\Tests;

use PHPUnit\Framework\TestCase;

use Wearesho\Bobra\Ubki\Data;

/**
 * Class ReferenceTest
 * @internal
 * @package Wearesho\Bobra\Ubki\Tests
 */
class ReferenceTest extends TestCase
{
    public function testToString(): void
    {
        $language = Ubki\Language::EN();

        $this->assertEquals('EN', (string)$language);

        $language = Ubki\Language::EN('english');

        $this->assertEquals('english', (string)$language);
    }

    public function testInstance(): void
    {
        $description = 'English language';
        $language = Data\Language::ENG($description);

        $this->assertEquals(Data\Language::ENG, $language->getValue());
        $this->assertEquals($description, $language->getDescription());
        $this->assertEquals(Data\Language::ENG()->getKey(), $language->getKey());
        $this->assertEquals('ENG', $language->getKey());
    }

    /**
     * @expectedException \BadMethodCallException
     * @expectedExceptionMessage No static method or enum constant 'BD' in class Wearesho\Bobra\Ubki\Data\Language
     */
    public function testInvalidConst(): void
    {
        Data\Language::BD();
    }
}
