<?php

namespace Wearesho\Bobra\Ubki\Tests\Unit\Data\Blocks;

use Carbon\Carbon;
use PHPUnit\Framework\TestCase;
use Wearesho\Bobra\Ubki;

/**
 * Class CreditsRegistersInformationTest
 * @package Wearesho\Bobra\Ubki\Tests\Unit\Data\Blocks
 * @coversDefaultClass \Wearesho\Bobra\Ubki\Data\Blocks\CreditsRegistersInformation
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

    /** @var Ubki\Data\Blocks\CreditsRegistersInformation */
    protected $fakeCreditsRegistersInformation;

    protected function setUp(): void
    {
        $this->fakeCreditsRegistersInformation = new Ubki\Data\Blocks\CreditsRegistersInformation(
            new Ubki\Data\Collections\CreditRegisters([
                new Ubki\Data\Elements\CreditRequest(
                    Carbon::parse(static::DATE),
                    static::INN,
                    static::ID,
                    Ubki\Dictionaries\Decision::POSITIVE(),
                    Ubki\Dictionaries\RequestReason::EXPORT(),
                    static::ORGANIZATION
                )
            ]),
            new Ubki\Data\Elements\RegistryTimes(
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
                    new Ubki\Data\Elements\CreditRequest(
                        Carbon::parse(static::DATE),
                        static::INN,
                        static::ID,
                        Ubki\Dictionaries\Decision::POSITIVE(),
                        Ubki\Dictionaries\RequestReason::EXPORT(),
                        static::ORGANIZATION
                    ),
                ],
                'times' => [
                    Ubki\Data\Interfaces\RegistryTimes::BY_HOUR => static::BY_HOUR,
                    Ubki\Data\Interfaces\RegistryTimes::BY_DAY => static::BY_DAY,
                    Ubki\Data\Interfaces\RegistryTimes::BY_WEEK => static::BY_WEEK,
                    Ubki\Data\Interfaces\RegistryTimes::BY_MONTH => static::BY_MONTH,
                    Ubki\Data\Interfaces\RegistryTimes::BY_QUARTER => static::BY_QUARTER,
                    Ubki\Data\Interfaces\RegistryTimes::BY_YEAR => static::BY_YEAR,
                    Ubki\Data\Interfaces\RegistryTimes::BY_MORE_YEAR => static::BY_MORE_YEAR,
                ],
            ],
            $this->fakeCreditsRegistersInformation->jsonSerialize()
        );
    }

    public function testTag(): void
    {
        $this->assertEquals(
            Ubki\Data\Blocks\CreditsRegistersInformation::TAG,
            $this->fakeCreditsRegistersInformation->tag()
        );
    }

    public function testGetCreditRequests(): void
    {
        $this->assertEquals(
            new Ubki\Data\Collections\CreditRegisters([
                new Ubki\Data\Elements\CreditRequest(
                    Carbon::parse(static::DATE),
                    static::INN,
                    static::ID,
                    Ubki\Dictionaries\Decision::POSITIVE(),
                    Ubki\Dictionaries\RequestReason::EXPORT(),
                    static::ORGANIZATION
                )
            ]),
            $this->fakeCreditsRegistersInformation->getCreditRequests()
        );
    }

    public function testGetRegistryTrim(): void
    {
        $this->assertEquals(
            new Ubki\Data\Elements\RegistryTimes(
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
