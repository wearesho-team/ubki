<?php

namespace Wearesho\Bobra\Ubki\Tests\Unit\Enum;

use PHPUnit\Framework\TestCase;
use Wearesho\Bobra\Ubki\Enum\Education;

/**
 * Class EducationTest
 * @package Wearesho\Bobra\Ubki\Tests\Unit\Enum
 */
class EducationTest extends TestCase
{
    public function testEnums(): void
    {
        $this->assertEquals(Education::ACADEMIC(), new Education(Education::ACADEMIC));
        $this->assertEquals(Education::BY_SELF(), new Education(Education::BY_SELF));
        $this->assertEquals(Education::HIGH(), new Education(Education::HIGH));
        $this->assertEquals(Education::HIGH_UNFINISHED(), new Education(Education::HIGH_UNFINISHED));
        $this->assertEquals(Education::SECONDARY(), new Education(Education::SECONDARY));
        $this->assertEquals(Education::SECONDARY_TECH(), new Education(Education::SECONDARY_TECH));
        $this->assertEquals(Education::SECONDARY_UNFINISHED(), new Education(Education::SECONDARY_UNFINISHED));
    }
}
