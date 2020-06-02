<?php

namespace Wearesho\Bobra\Ubki\Tests;

use Wearesho\Bobra\Ubki\Dictionaries\Language;

class DictionaryTest extends TestCase
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

    public function testInvalidConst(): void
    {
        $this->expectException(\BadMethodCallException::class);
        $this->expectExceptionMessage(
            "No static method or enum constant 'BDA' in class Wearesho\Bobra\Ubki\Dictionaries\Language"
        );
        /** @noinspection PhpUndefinedMethodInspection */
        Language::BDA();
    }
}
