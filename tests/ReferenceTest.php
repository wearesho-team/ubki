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
        $languageType = 'EN';
        /** @var Ubki\Tests\Mocks\Language $language */
        $language = Ubki\Tests\Mocks\Language::{$languageType}($description);

        $this->assertEquals(Ubki\Tests\Mocks\Language::EN, $language->getValue());
        $this->assertEquals($description, $language->getDescription());
        $this->assertEquals($languageType, $language->getKey());
    }
}
