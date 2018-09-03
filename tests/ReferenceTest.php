<?php

namespace Wearesho\Bobra\Ubki\Tests;

use PHPUnit\Framework\TestCase;

use Wearesho\Bobra\Ubki\References\Language;

/**
 * Class ReferenceTest
 * @package Wearesho\Bobra\Ubki\Tests
 * @coversDefaultClass \Wearesho\Bobra\Ubki\Reference
 * @internal
 */
class ReferenceTest extends TestCase
{
    protected const LANGUAGE_KEY = 'ENG';
    protected const LANGUAGE_DESCRIPTION = 'description';

    public function testInstance(): void
    {
        $language = Language::ENG(static::LANGUAGE_DESCRIPTION);

        $this->assertEquals(Language::ENG, $language->getValue());
        $this->assertEquals(static::LANGUAGE_DESCRIPTION, $language->getDescription());
        $this->assertEquals(Language::ENG()->getKey(), $language->getKey());
        $this->assertEquals(static::LANGUAGE_KEY, $language->getKey());
    }

    public function testToString(): void
    {
        $language = Language::ENG();
        $this->assertEquals(static::LANGUAGE_KEY, (string)$language);
        $language = Language::ENG(static::LANGUAGE_DESCRIPTION);
        $this->assertEquals(static::LANGUAGE_DESCRIPTION, (string)$language);
    }

    /**
     * @expectedException \BadMethodCallException
     * @expectedExceptionMessage No static method or enum constant 'BDA' in class
     *                           Wearesho\Bobra\Ubki\References\Language
     */
    public function testInvalidConst(): void
    {
        Language::BDA();
    }
}
