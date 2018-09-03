<?php

namespace Wearesho\Bobra\Ubki\Tests\Blocks\Entities;

use Carbon\Carbon;

use PHPUnit\Framework\TestCase;

use Wearesho\Bobra\Ubki\Blocks\Entities\CreditRegister;
use Wearesho\Bobra\Ubki\References\Decision;

/**
 * Class CreditRegisterTest
 * @package Wearesho\Bobra\Ubki\Tests\Blocks\Entities
 * @coversDefaultClass CreditRegister
 * @internal
 */
class CreditRegisterTest extends TestCase
{
    protected const DATE = '2018-03-12';
    protected const INN = 'testInn';
    protected const ID = 'testId';
    protected const REASON = 1;
    protected const ORGANIZATION = 'testOrganization';

    /** @var CreditRegister */
    protected $fakeCreditRegister;

    protected function setUp(): void
    {
        $this->fakeCreditRegister = new CreditRegister(
            Carbon::parse(static::DATE),
            static::INN,
            static::ID,
            Decision::POSITIVE(),
            static::REASON,
            static::ORGANIZATION
        );
    }

    public function testJsonSerialize(): void
    {
        $this->assertArraySubset(
            [
                'date' => static::DATE,
                'inn' => static::INN,
                'id' => static::ID,
                'decision' => Decision::POSITIVE()->getKey(),
                'reason' => static::REASON,
                'organization' => static::ORGANIZATION
            ],
            $this->fakeCreditRegister->jsonSerialize()
        );
    }

    public function testGetReason(): void
    {
        $this->assertEquals(
            static::REASON,
            $this->fakeCreditRegister->getReason()
        );
    }

    public function testGetDecision(): void
    {
        $this->assertEquals(
            Decision::POSITIVE(),
            $this->fakeCreditRegister->getDecision()
        );
    }

    public function testGetOrganization(): void
    {
        $this->assertEquals(
            static::ORGANIZATION,
            $this->fakeCreditRegister->getOrganization()
        );
    }

    public function testGetInn(): void
    {
        $this->assertEquals(
            static::INN,
            $this->fakeCreditRegister->getInn()
        );
    }

    public function testGetId(): void
    {
        $this->assertEquals(
            static::ID,
            $this->fakeCreditRegister->getId()
        );
    }

    public function testGetDate(): void
    {
        $this->assertEquals(
            static::DATE,
            Carbon::instance($this->fakeCreditRegister->getDate())->toDateString()
        );
    }
}
