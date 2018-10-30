<?php

namespace Wearesho\Bobra\Ubki\Tests\Unit;

use PHPUnit\Framework\TestCase;
use Wearesho\Bobra\Ubki\Enum\SubjectRank;

/**
 * Class SubjectRankTest
 * @package Wearesho\Bobra\Ubki\Tests\Unit
 */
class SubjectRankTest extends TestCase
{
    public function testEnums(): void
    {
        $this->assertEquals(SubjectRank::DIRECTOR(), new SubjectRank(SubjectRank::DIRECTOR));
        $this->assertEquals(SubjectRank::FREELANCER(), new SubjectRank(SubjectRank::FREELANCER));
        $this->assertEquals(SubjectRank::MANAGER(), new SubjectRank(SubjectRank::MANAGER));
        $this->assertEquals(SubjectRank::SPECIALIST(), new SubjectRank(SubjectRank::SPECIALIST));
    }
}
