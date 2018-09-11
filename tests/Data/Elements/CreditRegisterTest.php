<?php

namespace Wearesho\Bobra\Ubki\Tests\Data\Elements;

use Carbon\Carbon;

use PHPUnit\Framework\TestCase;

use Wearesho\Bobra\Ubki\Data\Elements\CreditRequest;
use Wearesho\Bobra\Ubki\Dictionaries\Decision;
use Wearesho\Bobra\Ubki\Dictionaries\RequestReason;

/**
 * Class CreditRegisterTest
 * @package Wearesho\Bobra\Ubki\Tests\Data\Elements
 * @coversDefaultClass CreditRequest
 * @internal
 */
class CreditRegisterTest extends TestCase
{
    protected const DATE = '2018-03-12';
    protected const INN = 'testInn';
    protected const ID = 'testId';
    protected const REASON = 1;
    protected const ORGANIZATION = 'testOrganization';

    /** @var CreditRequest */
    protected $fakeCreditRegister;

    protected function setUp(): void
    {
        $this->fakeCreditRegister = new CreditRequest(
            Carbon::parse(static::DATE),
            static::INN,
            static::ID,
            Decision::POSITIVE(),
            RequestReason::EXPORT(),
            static::ORGANIZATION
        );
    }

    public function testJsonSerialize(): void
    {
        $this->assertArraySubset(
            [
                CreditRequest::DATE => Carbon::parse(static::DATE),
                CreditRequest::INN => static::INN,
                CreditRequest::ID => static::ID,
                CreditRequest::DECISION => Decision::POSITIVE(),
                CreditRequest::REASON => RequestReason::EXPORT(),
                CreditRequest::ORGANIZATION => static::ORGANIZATION
            ],
            $this->fakeCreditRegister->jsonSerialize()
        );
    }

    public function testGetReason(): void
    {
        $this->assertEquals(
            RequestReason::EXPORT(),
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
