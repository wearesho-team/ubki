<?php

namespace Wearesho\Bobra\Ubki\Tests\Data\Blocks;

use Carbon\Carbon;
use Wearesho\Bobra\Ubki\Tests\TestCase;
use Wearesho\Bobra\Ubki\Data\Collections\CreditRegisters;
use Wearesho\Bobra\Ubki\Data\Blocks\CreditsRegistersInformation;
use Wearesho\Bobra\Ubki\Data\Elements;
use Wearesho\Bobra\Ubki\Data\Interfaces\RegistryTimes;
use Wearesho\Bobra\Ubki\Dictionaries;

/**
 * Class CreditsRegistersInformationTest
 * @package Wearesho\Bobra\Ubki\Tests\Data\Blocks
 * @coversDefaultClass CreditsRegistersInformation
 * @internal
 */
class CreditsRegistersInformationTest extends TestCase
{
    protected const DATE = '2018-03-12';
    protected const INN = 'testInn';
    protected const ID = 'testId';
    protected const ORGANIZATION = 'testOrganization';
    protected const REESTR_TRIM = 'trim';
    protected const BY_HOUR = 1;
    protected const BY_DAY = 2;
    protected const BY_WEEK = 3;
    protected const BY_MONTH = 4;
    protected const BY_QUARTER = 5;
    protected const BY_YEAR = 10;
    protected const BY_MORE_YEAR = 200;

    /** @var CreditsRegistersInformation */
    protected $fakeCreditsRegistersInformation;

    protected function setUp(): void
    {
        $this->fakeCreditsRegistersInformation = new CreditsRegistersInformation(
            new CreditRegisters([
                new Elements\CreditRequest(
                    Carbon::parse(static::DATE),
                    static::INN,
                    static::ID,
                    Dictionaries\Decision::POSITIVE(),
                    Dictionaries\RequestReason::EXPORT(),
                    static::ORGANIZATION
                )
            ]),
            new Elements\RegistryTimes(
                static::BY_HOUR,
                static::BY_DAY,
                static::BY_WEEK,
                static::BY_MONTH,
                static::BY_QUARTER,
                static::BY_YEAR,
                static::BY_MORE_YEAR
            )
        );
    }

    public function testJsonSerialize(): void
    {
        $this->assertArraySubset(
            [
                'requests' => [
                    new Elements\CreditRequest(
                        Carbon::parse(static::DATE),
                        static::INN,
                        static::ID,
                        Dictionaries\Decision::POSITIVE(),
                        Dictionaries\RequestReason::EXPORT(),
                        static::ORGANIZATION
                    ),
                ],
                'times' => [
                    RegistryTimes::BY_HOUR => static::BY_HOUR,
                    RegistryTimes::BY_DAY => static::BY_DAY,
                    RegistryTimes::BY_WEEK => static::BY_WEEK,
                    RegistryTimes::BY_MONTH => static::BY_MONTH,
                    RegistryTimes::BY_QUARTER => static::BY_QUARTER,
                    RegistryTimes::BY_YEAR => static::BY_YEAR,
                    RegistryTimes::BY_MORE_YEAR => static::BY_MORE_YEAR,
                ],
            ],
            $this->fakeCreditsRegistersInformation->jsonSerialize()
        );
    }

    public function testTag(): void
    {
        $this->assertEquals(
            CreditsRegistersInformation::TAG,
            $this->fakeCreditsRegistersInformation->tag()
        );
    }

    public function testGetCreditRequests(): void
    {
        $this->assertEquals(
            new CreditRegisters([
                new Elements\CreditRequest(
                    Carbon::parse(static::DATE),
                    static::INN,
                    static::ID,
                    Dictionaries\Decision::POSITIVE(),
                    Dictionaries\RequestReason::EXPORT(),
                    static::ORGANIZATION
                )
            ]),
            $this->fakeCreditsRegistersInformation->getCreditRequests()
        );
    }

    public function testGetRegistryTrim(): void
    {
        $this->assertEquals(
            new Elements\RegistryTimes(
                static::BY_HOUR,
                static::BY_DAY,
                static::BY_WEEK,
                static::BY_MONTH,
                static::BY_QUARTER,
                static::BY_YEAR,
                static::BY_MORE_YEAR
            ),
            $this->fakeCreditsRegistersInformation->getRegistryTimes()
        );
    }
}
