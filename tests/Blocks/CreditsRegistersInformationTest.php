<?php

namespace Wearesho\Bobra\Ubki\Tests\Blocks;

use Carbon\Carbon;

use PHPUnit\Framework\TestCase;

use Wearesho\Bobra\Ubki\Data\Collections\CreditRegisters;
use Wearesho\Bobra\Ubki\Data\CreditsRegistersInformation;
use Wearesho\Bobra\Ubki\Data\Elements;
use Wearesho\Bobra\Ubki\Dictionaries\Decision;

/**
 * Class CreditsRegistersInformationTest
 * @package Wearesho\Bobra\Ubki\Tests\Data
 * @coversDefaultClass CreditsRegistersInformation
 * @internal
 */
class CreditsRegistersInformationTest extends TestCase
{
    protected const DATE = '2018-03-12';
    protected const INN = 'testInn';
    protected const ID = 'testId';
    protected const REASON = 1;
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
                    Decision::POSITIVE(),
                    static::REASON,
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
                    [
                        'date' => static::DATE,
                        'inn' => static::INN,
                        'id' => static::ID,
                        'decision' => Decision::POSITIVE()->getKey(),
                        'reason' => static::REASON,
                        'organization' => static::ORGANIZATION
                    ],
                ],
                'times' => [
                    'byHour' => static::BY_HOUR,
                    'byDay' => static::BY_DAY,
                    'byWeek' => static::BY_WEEK,
                    'byMonth' => static::BY_MONTH,
                    'byQuarter' => static::BY_QUARTER,
                    'byYear' => static::BY_YEAR,
                    'byMoreYear' => static::BY_MORE_YEAR,
                ],
            ],
            $this->fakeCreditsRegistersInformation->jsonSerialize()
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
                    Decision::POSITIVE(),
                    static::REASON,
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
