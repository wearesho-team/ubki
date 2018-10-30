<?php

namespace Wearesho\Bobra\Ubki\Tests\Unit\Enum;

use PHPUnit\Framework\TestCase;
use Wearesho\Bobra\Ubki\Enum\Gender;

/**
 * Class GenderTest
 * @package Wearesho\Bobra\Ubki\Tests\Unit\Enum
 */
class GenderTest extends TestCase
{
    public function testEnums(): void
    {
        $this->assertEquals(Gender::MALE(), new Gender(Gender::MALE));
        $this->assertEquals(Gender::FEMALE(), new Gender(Gender::FEMALE));
    }
}
