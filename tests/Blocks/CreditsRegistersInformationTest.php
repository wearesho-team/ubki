<?php

namespace Wearesho\Bobra\Ubki\Tests\Blocks;

use Carbon\Carbon;

use PHPUnit\Framework\TestCase;

use Wearesho\Bobra\Ubki\Blocks\Collections\CreditRegisters;
use Wearesho\Bobra\Ubki\Blocks\CreditsRegistersInformation;
use Wearesho\Bobra\Ubki\Blocks\Entities\CreditRegister;
use Wearesho\Bobra\Ubki\References\Decision;

/**
 * Class CreditsRegistersInformationTest
 * @package Wearesho\Bobra\Ubki\Tests\Blocks
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

    /** @var CreditsRegistersInformation */
    protected $fakeCreditsRegistersInformation;

    protected function setUp(): void
    {
        $this->fakeCreditsRegistersInformation = new CreditsRegistersInformation(
            new CreditRegisters([
                new CreditRegister(
                    Carbon::parse(static::DATE),
                    static::INN,
                    static::ID,
                    Decision::POSITIVE(),
                    static::REASON,
                    static::ORGANIZATION
                )
            ]),
            static::REESTR_TRIM
        );
    }

    public function testGetCreditRequests(): void
    {
        $this->assertEquals(
            new CreditRegisters([
                new CreditRegister(
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
            static::REESTR_TRIM,
            $this->fakeCreditsRegistersInformation->getRegistryTrim()
        );
    }
}
