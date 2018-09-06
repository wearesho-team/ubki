<?php

namespace Wearesho\Bobra\Ubki\Tests\Pull\Elements;

use Carbon\Carbon;

use PHPUnit\Framework\TestCase;

use Wearesho\Bobra\Ubki\Pull\Elements\Identification;

/**
 * Class IdentificationTest
 * @package Wearesho\Bobra\Ubki\Tests\Pull\Elements
 * @coversDefaultClass Identification
 * @internal
 */
class IdentificationTest extends TestCase
{
    protected const INN = 'testInn';
    protected const NAME = 'testName';
    protected const PATRONYMIC = 'testPatronymic';
    protected const SURNAME = 'testSurname';
    protected const BIRTH_DATE = '2018-03-12';

    /** @var Identification */
    protected $fakeIdentification;

    protected function setUp(): void
    {
        $this->fakeIdentification = new Identification(
            static::INN,
            static::NAME,
            static::PATRONYMIC,
            static::SURNAME,
            Carbon::parse(static::BIRTH_DATE)
        );
    }

    public function testJsonSerialize(): void
    {
        $this->assertArraySubset(
            [
                Identification::INN => static::INN,
                Identification::NAME => static::NAME,
                Identification::PATRONYMIC => static::PATRONYMIC,
                Identification::SURNAME => static::SURNAME,
                Identification::BIRTH_DATE => static::BIRTH_DATE,
            ],
            $this->fakeIdentification->jsonSerialize()
        );
    }

    public function testGetName(): void
    {
        $this->assertEquals(
            static::NAME,
            $this->fakeIdentification->getName()
        );
    }

    public function testGetPatronymic(): void
    {
        $this->assertEquals(
            static::PATRONYMIC,
            $this->fakeIdentification->getPatronymic()
        );
    }

    public function testGetSurname(): void
    {
        $this->assertEquals(
            static::SURNAME,
            $this->fakeIdentification->getSurname()
        );
    }

    public function testGetBirthDate(): void
    {
        $this->assertEquals(
            static::BIRTH_DATE,
            Carbon::instance($this->fakeIdentification->getBirthDate())->toDateString()
        );
    }

    public function testGetInn(): void
    {
        $this->assertEquals(
            static::INN,
            $this->fakeIdentification->getInn()
        );
    }
}
