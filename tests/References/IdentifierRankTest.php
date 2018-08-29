<?php

namespace Wearesho\Bobra\Ubki\Tests\References;

use Wearesho\Bobra\Ubki\References\IdentifierRank;
use Wearesho\Bobra\Ubki\Tests\Extend\ReferenceTestCase;

/**
 * Class IdentifierRankTest
 * @package Wearesho\Bobra\Ubki\Tests\References
 * @coversDefaultClass IdentifierRank
 * @internal
 */
class IdentifierRankTest extends ReferenceTestCase
{
    public function testDirector(): void
    {
        $this->fakeReference = IdentifierRank::DIRECTOR(static::DESCRIPTION);
        $this->assertEquals(
            IdentifierRank::DIRECTOR(static::DESCRIPTION),
            $this->fakeReference
        );
    }

    public function testFreelancer(): void
    {
        $this->fakeReference = IdentifierRank::FREELANCER(static::DESCRIPTION);
        $this->assertEquals(
            IdentifierRank::FREELANCER(static::DESCRIPTION),
            $this->fakeReference
        );
    }

    public function testSpecialist(): void
    {
        $this->fakeReference = IdentifierRank::SPECIALIST(static::DESCRIPTION);
        $this->assertEquals(
            IdentifierRank::SPECIALIST(static::DESCRIPTION),
            $this->fakeReference
        );
    }

    public function testManager(): void
    {
        $this->fakeReference = IdentifierRank::MANAGER(static::DESCRIPTION);
        $this->assertEquals(
            IdentifierRank::MANAGER(static::DESCRIPTION),
            $this->fakeReference
        );
    }
}
