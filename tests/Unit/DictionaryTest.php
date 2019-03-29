<?php

namespace Wearesho\Bobra\Ubki\Tests\Unit;

use PHPUnit\Framework\TestCase;
use Wearesho\Bobra\Ubki\Dictionary\Language;

/**
 * Class DictionaryTest
 * @package Wearesho\Bobra\Ubki\Tests\Unit
 * @coversDefaultClass \Wearesho\Bobra\Ubki\Dictionary
 * @internal
 */
class DictionaryTest extends TestCase
{
    protected const LANGUAGE_DESCRIPTION = 'description';

    public function testInstance(): void
    {
        $language = Language::ENG(static::LANGUAGE_DESCRIPTION);

        $this->assertEquals(Language::ENG, $language->getValue());
        $this->assertEquals(static::LANGUAGE_DESCRIPTION, $language->getDescription());
        $this->assertEquals(Language::ENG()->getKey(), $language->getKey());
        $this->assertEquals('ENG', $language->getKey());
    }

    public function testToString(): void
    {
        $language = Language::ENG();
        $this->assertEquals(Language::ENG, (string)$language);
        $language = Language::ENG(static::LANGUAGE_DESCRIPTION);
        $this->assertEquals(static::LANGUAGE_DESCRIPTION, (string)$language);
    }

    /**
     * @expectedException \BadMethodCallException
     * @expectedExceptionMessage No static method or enum constant 'BDA' in class
     *                           Wearesho\Bobra\Ubki\Dictionary\Language
     */
    public function testInvalidConst(): void
    {
        Language::BDA();
    }

    public function testJsonSerialize(): void
    {
        $language = Language::ENG(static::LANGUAGE_DESCRIPTION);

        $this->assertEquals(
            [
                'value' => Language::ENG,
                'key' => 'ENG',
                'description' => static::LANGUAGE_DESCRIPTION,
            ],
            $language->jsonSerialize()
        );
    }
}
