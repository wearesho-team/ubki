<?php

namespace Wearesho\Bobra\Ubki\Tests\Blocks;

use Carbon\Carbon;

use PHPUnit\Framework\TestCase;

use Wearesho\Bobra\Ubki\Blocks\PassportMVDInformation;
use Wearesho\Bobra\Ubki\Blocks\Entities\PassportMVD;
use Wearesho\Bobra\Ubki\References;

/**
 * Class PassportMVDInformationTest
 * @package Wearesho\Bobra\Ubki\Tests\Blocks
 * @coversDefaultClass PassportMVDInformation
 * @internal
 */
class PassportMVDInformationTest extends TestCase
{
    protected const FOUND_DESCRIPTION = 'testFoundDescription';
    protected const DESCRIPTION = 'testDescription';
    protected const STATUS = 'testStatus';
    protected const DATE = '2018-03-12';
    protected const SERIAL = 'testSerial';
    protected const NUMBER = 'testNumber';
    protected const NAME = 'testName';
    protected const SURNAME = 'testSurname';
    protected const PATRONYMIC = 'testPatronymic';
    protected const BIRTH_DATE = '1998-03-12';

    /** @var PassportMVDInformation */
    protected $fakePassportMVDInformation;

    protected function setUp(): void
    {
        $this->fakePassportMVDInformation = new PassportMVDInformation(
            new PassportMVD(
                References\Flag::YES(static::FOUND_DESCRIPTION),
                static::DESCRIPTION,
                static::STATUS,
                Carbon::parse(static::DATE),
                static::SERIAL,
                static::NUMBER,
                static::SURNAME,
                static::NAME,
                static::PATRONYMIC,
                Carbon::parse(static::BIRTH_DATE)
            )
        );
    }

    public function testGetPassportMVD(): void
    {
        $this->assertEquals(
            new PassportMVD(
                References\Flag::YES(static::FOUND_DESCRIPTION),
                static::DESCRIPTION,
                static::STATUS,
                Carbon::parse(static::DATE),
                static::SERIAL,
                static::NUMBER,
                static::SURNAME,
                static::NAME,
                static::PATRONYMIC,
                Carbon::parse(static::BIRTH_DATE)
            ),
            $this->fakePassportMVDInformation->getPassportMVD()
        );
    }
}
