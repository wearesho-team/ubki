<?php

namespace Wearesho\Bobra\Ubki\Tests\Enum;

use PHPUnit\Framework\TestCase;
use Wearesho\Bobra\Ubki\Enum\Language;

/**
 * Class LanguageTest
 * @package Wearesho\Bobra\Ubki\Tests\Enum
 */
class LanguageTest extends TestCase
{
    public function testEnums(): void
    {
        $this->assertEquals(Language::RUS(), new Language(Language::RUS));
        $this->assertEquals(Language::UKR(), new Language(Language::UKR));
        $this->assertEquals(Language::ELL(), new Language(Language::ELL));
        $this->assertEquals(Language::ENG(), new Language(Language::ENG));
        $this->assertEquals(Language::KAT(), new Language(Language::KAT));
        $this->assertEquals(Language::KAZ(), new Language(Language::KAZ));
        $this->assertEquals(Language::ZHO(), new Language(Language::ZHO));
        $this->assertEquals(Language::LAV(), new Language(Language::LAV));
    }
}
