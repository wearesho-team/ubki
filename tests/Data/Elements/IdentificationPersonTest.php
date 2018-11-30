<?php

namespace Wearesho\Bobra\Ubki\Tests\Data\Elements;

use Carbon\Carbon;
use Wearesho\Bobra\Ubki\Data\Elements\IdentificationPerson;

use PHPUnit\Framework\TestCase;
use Wearesho\Bobra\Ubki\Data\Interfaces\IdentifiedPerson;

/**
 * Class IdentificationPersonTest
 * @package Wearesho\Bobra\Ubki\Tests\Data\Elements
 * @coversDefaultClass IdentificationPerson
 * @internal
 */
class IdentificationPersonTest extends TestCase
{
    protected const NAME = 'testName';
    protected const INN = 'testInn';
    protected const SURNAME = 'testSurname';
    protected const PATRONYMIC = 'testPatronymic';
    protected const BIRTH_DATE = '2018-03-12';
    protected const ORGANIZATION = 'testOrganization';

    /** @var IdentificationPerson */
    protected $fakeIdentificationPerson;

    protected function setUp(): void
    {
        $this->fakeIdentificationPerson = new IdentificationPerson(
            static::NAME,
            static::INN,
            static::SURNAME,
            static::PATRONYMIC,
            Carbon::parse(static::BIRTH_DATE),
            static::ORGANIZATION
        );
    }

    public function testJsonSerialize(): void
    {
        $this->assertArraySubset(
            [
                IdentificationPerson::INN => static::INN,
                IdentificationPerson::BIRTH_DATE => Carbon::parse(static::BIRTH_DATE),
                IdentificationPerson::SURNAME => static::SURNAME,
                IdentificationPerson::PATRONYMIC => static::PATRONYMIC,
                IdentificationPerson::NAME => static::NAME,
                IdentificationPerson::ORGANIZATION => static::ORGANIZATION
            ],
            $this->fakeIdentificationPerson->jsonSerialize()
        );
    }

    public function testTag(): void
    {
        $this->assertEquals(
            IdentifiedPerson::TAG,
            $this->fakeIdentificationPerson->tag()
        );
    }

    public function testGetSurname(): void
    {
        $this->assertEquals(
            static::SURNAME,
            $this->fakeIdentificationPerson->getSurname()
        );
    }

    public function testGetOrganization(): void
    {
        $this->assertEquals(
            static::ORGANIZATION,
            $this->fakeIdentificationPerson->getOrganization()
        );
    }

    public function testGetName(): void
    {
        $this->assertEquals(
            static::NAME,
            $this->fakeIdentificationPerson->getName()
        );
    }

    public function testGetPatronymic(): void
    {
        $this->assertEquals(
            static::PATRONYMIC,
            $this->fakeIdentificationPerson->getPatronymic()
        );
    }

    public function testGetBirthDate(): void
    {
        $this->assertEquals(
            static::BIRTH_DATE,
            Carbon::instance($this->fakeIdentificationPerson->getBirthDate())->toDateString()
        );
    }

    public function testGetInn(): void
    {
        $this->assertEquals(
            static::INN,
            $this->fakeIdentificationPerson->getInn()
        );
    }
}
