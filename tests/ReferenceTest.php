<?php

namespace Wearesho\Bobra\Ubki\Tests;

use PHPUnit\Framework\TestCase;

use Wearesho\Bobra\Ubki\Data\Language;

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
        $language = Language::ENG($description);

        $this->assertEquals(Language::ENG, $language->getValue());
        $this->assertEquals($description, $language->getDescription());
        $this->assertEquals(Language::ENG()->getKey(), $language->getKey());
        $this->assertEquals('ENG', $language->getKey());
    }

    /**
     * @expectedException \BadMethodCallException
     * @expectedExceptionMessage No static method or enum constant 'BD' in class Wearesho\Bobra\Ubki\Data\Language
     */
    public function testInvalidConst(): void
    {
        Language::BD();
    }
}
