<?php

namespace Wearesho\Bobra\Ubki\Tests\Unit\Data\Elements;

use Carbon\Carbon;
use PHPUnit\Framework\TestCase;
use Wearesho\Bobra\Ubki;

/**
 * Class CreditRegisterTest
 * @package Wearesho\Bobra\Ubki\Tests\Unit\Data\Elements
 * @coversDefaultClass \Wearesho\Bobra\Ubki\Data\Elements\CreditRequest
 * @internal
 */
class CreditRegisterTest extends TestCase
{
    protected const DATE = '2018-03-12';
    protected const INN = 'testInn';
    protected const ID = 'testId';
    protected const REASON = 1;
    protected const ORGANIZATION = 'testOrganization';

    /** @var Ubki\Data\Elements\CreditRequest */
    protected $fakeCreditRegister;

    protected function setUp(): void
    {
        $this->fakeCreditRegister = new Ubki\Data\Elements\CreditRequest(
            Carbon::parse(static::DATE),
            static::INN,
            static::ID,
            Ubki\Dictionaries\Decision::POSITIVE(),
            Ubki\Dictionaries\RequestReason::EXPORT(),
            static::ORGANIZATION
        );
    }

    public function testJsonSerialize(): void
    {
        $this->assertArraySubset(
            [
                Ubki\Data\Elements\CreditRequest::DATE => Carbon::parse(static::DATE),
                Ubki\Data\Elements\CreditRequest::INN => static::INN,
                Ubki\Data\Elements\CreditRequest::ID => static::ID,
                Ubki\Data\Elements\CreditRequest::DECISION => Ubki\Dictionaries\Decision::POSITIVE(),
                Ubki\Data\Elements\CreditRequest::REASON => Ubki\Dictionaries\RequestReason::EXPORT(),
                Ubki\Data\Elements\CreditRequest::ORGANIZATION => static::ORGANIZATION
            ],
            $this->fakeCreditRegister->jsonSerialize()
        );
    }

    public function testTag(): void
    {
        $this->assertEquals(
            Ubki\Data\Interfaces\CreditRegister::TAG,
            $this->fakeCreditRegister->tag()
        );
    }

    public function testGetReason(): void
    {
        $this->assertEquals(
            Ubki\Dictionaries\RequestReason::EXPORT(),
            $this->fakeCreditRegister->getReason()
        );
    }

    public function testGetDecision(): void
    {
        $this->assertEquals(
            Ubki\Dictionaries\Decision::POSITIVE(),
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
