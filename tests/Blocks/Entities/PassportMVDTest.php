<?php

namespace Wearesho\Bobra\Ubki\Tests\Blocks\Entities;

use Carbon\Carbon;

use PHPUnit\Framework\TestCase;

use Wearesho\Bobra\Ubki\Data\Elements\PassportMVD;
use Wearesho\Bobra\Ubki\References;

/**
 * Class PassportMVDTest
 * @package Wearesho\Bobra\Ubki\Tests\Data\Elements
 * @coversDefaultClass PassportMVD
 * @internal
 */
class PassportMVDTest extends TestCase
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

    /** @var PassportMVD */
    protected $fakePassportMVD;

    protected function setUp(): void
    {
        $this->fakePassportMVD = new PassportMVD(
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
        );
    }

    public function testJsonSerialize(): void
    {
        $this->assertArraySubset(
            [
                'found' => static::FOUND_DESCRIPTION,
                'description' => static::DESCRIPTION,
                'status' => static::STATUS,
                'date' => static::DATE,
                'serial' => static::SERIAL,
                'number' => static::NUMBER,
                'surname' => static::SURNAME,
                'name' => static::NAME,
                'patronymic' => static::PATRONYMIC,
                'birthDate' => static::BIRTH_DATE,
            ],
            $this->fakePassportMVD->jsonSerialize()
        );
    }

    public function testGetBirthDate(): void
    {
        $this->assertEquals(
            static::BIRTH_DATE,
            $this->fakePassportMVD->getBirthDate()->toDateString()
        );
    }

    public function testGetStatus(): void
    {
        $this->assertEquals(
            static::STATUS,
            $this->fakePassportMVD->getStatus()
        );
    }

    public function testGetDate(): void
    {
        $this->assertEquals(
            static::DATE,
            $this->fakePassportMVD->getDate()->toDateString()
        );
    }

    public function testGetSerial(): void
    {
        $this->assertEquals(
            static::SERIAL,
            $this->fakePassportMVD->getSerial()
        );
    }

    public function testGetDescription(): void
    {
        $this->assertEquals(
            static::DESCRIPTION,
            $this->fakePassportMVD->getDescription()
        );
    }

    public function testGetNumber(): void
    {
        $this->assertEquals(
            static::NUMBER,
            $this->fakePassportMVD->getNumber()
        );
    }

    public function testGetFound(): void
    {
        $this->assertEquals(
            References\Flag::YES(static::FOUND_DESCRIPTION),
            $this->fakePassportMVD->getFound()
        );
    }

    public function testGetPatronymic(): void
    {
        $this->assertEquals(
            static::PATRONYMIC,
            $this->fakePassportMVD->getPatronymic()
        );
    }

    public function testGetName(): void
    {
        $this->assertEquals(
            static::NAME,
            $this->fakePassportMVD->getName()
        );
    }

    public function testGetSurname(): void
    {
        $this->assertEquals(
            static::SURNAME,
            $this->fakePassportMVD->getSurname()
        );
    }
}
