<?php

namespace Wearesho\Bobra\Ubki\Tests\References;

use Wearesho\Bobra\Ubki\References\CourtDealType;
use Wearesho\Bobra\Ubki\Tests\Extend\ReferenceTestCase;

/**
 * Class CourtDealTypeTest
 * @package Wearesho\Bobra\Ubki\Tests\References
 * @coversDefaultClass CourtDealType
 * @internal
 */
class CourtDealTypeTest extends ReferenceTestCase
{
    public function testProblemLoans(): void
    {
        $this->fakeReference = CourtDealType::PROBLEM_LOANS(static::DESCRIPTION);
        $this->assertEquals(
            CourtDealType::PROBLEM_LOANS(static::DESCRIPTION),
            $this->fakeReference
        );
    }

    public function testLabor(): void
    {
        $this->fakeReference = CourtDealType::LABOR(static::DESCRIPTION);
        $this->assertEquals(
            CourtDealType::LABOR(static::DESCRIPTION),
            $this->fakeReference
        );
    }

    public function testCriminal(): void
    {
        $this->fakeReference = CourtDealType::CRIMINAL(static::DESCRIPTION);
        $this->assertEquals(
            CourtDealType::CRIMINAL(static::DESCRIPTION),
            $this->fakeReference
        );
    }

    public function testCivil(): void
    {
        $this->fakeReference = CourtDealType::CIVIL(static::DESCRIPTION);
        $this->assertEquals(
            CourtDealType::CIVIL(static::DESCRIPTION),
            $this->fakeReference
        );
    }

    public function testAdministrative(): void
    {
        $this->fakeReference = CourtDealType::ADMINISTRATIVE(static::DESCRIPTION);
        $this->assertEquals(
            CourtDealType::ADMINISTRATIVE(static::DESCRIPTION),
            $this->fakeReference
        );
    }

    public function testEconomic(): void
    {
        $this->fakeReference = CourtDealType::ECONOMIC(static::DESCRIPTION);
        $this->assertEquals(
            CourtDealType::ECONOMIC(static::DESCRIPTION),
            $this->fakeReference
        );
    }

    public function testComplexClaims(): void
    {
        $this->fakeReference = CourtDealType::COMPLEX_CLAIMS(static::DESCRIPTION);
        $this->assertEquals(
            CourtDealType::COMPLEX_CLAIMS(static::DESCRIPTION),
            $this->fakeReference
        );
    }
}
