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
    // todo: revert this changes when types will be added
    /**
     * @expectedException \Error
     * @expectedExceptionMessage Class 'Wearesho\Bobra\Ubki\Type\Language' not found
     */
    public function testInstance()
    {
        $description = 'English language';
        $language = Ubki\Type\Language::EN($description);

        $this->assertEquals(Ubki\Type\Language::EN, $language->getValue());
        $this->assertEquals($description, $language->getDescription());
        $this->assertEquals(Ubki\Type\Language::EN()->getKey(), $language->getKey());
        $this->assertEquals('EN', $language->getKey());
    }

    /**
     * @expectedException \Error
     * @expectedExceptionMessage Class 'Wearesho\Bobra\Ubki\Type\Language' not found
     */
    public function testInvalidConst(): void
    {
        Ubki\Type\Language::BD();
    }
}
