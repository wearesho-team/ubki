<?php

namespace Wearesho\Bobra\Ubki\Tests\Unit\Enum;

use PHPUnit\Framework\TestCase;
use Wearesho\Bobra\Ubki\Enum\SocialStatus;

/**
 * Class SocialStatusTest
 * @package Wearesho\Bobra\Ubki\Tests\Unit\Enum
 */
class SocialStatusTest extends TestCase
{
    public function testEnums(): void
    {
        $this->assertEquals(SocialStatus::OTHER(), new SocialStatus(SocialStatus::OTHER));
        $this->assertEquals(SocialStatus::FULL_TIME(), new SocialStatus(SocialStatus::FULL_TIME));
        $this->assertEquals(SocialStatus::MATERNITY_LEAVE(), new SocialStatus(SocialStatus::MATERNITY_LEAVE));
        $this->assertEquals(SocialStatus::PART_TIME(), new SocialStatus(SocialStatus::PART_TIME));
        $this->assertEquals(SocialStatus::PENSIONER(), new SocialStatus(SocialStatus::PENSIONER));
        $this->assertEquals(SocialStatus::PENSIONER_WORK(), new SocialStatus(SocialStatus::PENSIONER_WORK));
        $this->assertEquals(SocialStatus::STUDENT(), new SocialStatus(SocialStatus::STUDENT));
        $this->assertEquals(SocialStatus::TEMP_UNEMPLOYED(), new SocialStatus(SocialStatus::TEMP_UNEMPLOYED));
        $this->assertEquals(SocialStatus::TERM_TIME(), new SocialStatus(SocialStatus::TERM_TIME));
    }
}
