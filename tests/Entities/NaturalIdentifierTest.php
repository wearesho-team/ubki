<?php

namespace Wearesho\Bobra\Ubki\Tests\Entities;

use Carbon\Carbon;

use PHPUnit\Framework\TestCase;

use Wearesho\Bobra\Ubki\Entities\NaturalIdentifier;
use Wearesho\Bobra\Ubki\References;
use Wearesho\Bobra\Ubki\Data;

/**
 * Class NaturalIdentifierTest
 * @package Wearesho\Bobra\Ubki\Tests\Entities
 * @coversDefaultClass NaturalIdentifier
 * @internal
 */
class NaturalIdentifierTest extends TestCase
{
    protected const CREATED_AT = '2020-03-12';
    protected const NAME = 'testName';
    protected const SURNAME = 'testSurname';
    protected const BIRTH_DATE = '1998-03-12';
    protected const INN = '1234567890';
    protected const PATRONYMIC = 'testPatronymic';
    protected const CHILDREN_COUNT = 0;

    /** @var NaturalIdentifier */
    protected $fakeNaturalIdentifier;

    protected function setUp(): void
    {
        $this->fakeNaturalIdentifier = new NaturalIdentifier(
            Carbon::parse(static::CREATED_AT),
            References\Language::ENG(),
            static::NAME,
            static::SURNAME,
            Carbon::parse(static::BIRTH_DATE),
            Data\Gender::MAN(),
            static::INN,
            static::PATRONYMIC,
            Data\FamilyStatus::SINGLE(),
            Data\Education::SECONDARY_TECH(),
            Data\Nationality::UKRAINE(),
            Data\RegistrationSpd::PHYSICAL(),
            Data\SocialStatus::FULL_TIME(),
            static::CHILDREN_COUNT
        );
    }

    public function testSocialStatus(): void
    {
        $this->assertEquals(
            Data\SocialStatus::FULL_TIME(),
            $this->fakeNaturalIdentifier->getSocialStatus()
        );
    }

    public function testGetRegistrationSpd(): void
    {
        $this->assertEquals(
            Data\RegistrationSpd::PHYSICAL(),
            $this->fakeNaturalIdentifier->getRegistrationSpd()
        );
    }

    public function testGetNationality(): void
    {
        $this->assertEquals(
            Data\Nationality::UKRAINE(),
            $this->fakeNaturalIdentifier->getNationality()
        );
    }

    public function testGetEducation(): void
    {
        $this->assertEquals(
            Data\Education::SECONDARY_TECH(),
            $this->fakeNaturalIdentifier->getEducation()
        );
    }

    public function testGetCreatedAt(): void
    {
        $this->assertEquals(
            static::CREATED_AT,
            Carbon::instance($this->fakeNaturalIdentifier->getCreatedAt())->toDateString()
        );
    }

    public function testGetLanguage(): void
    {
        $this->assertEquals(
            References\Language::ENG(),
            $this->fakeNaturalIdentifier->getLanguage()
        );
    }

    public function testGetName(): void
    {
        $this->assertEquals(
            static::NAME,
            $this->fakeNaturalIdentifier->getName()
        );
    }

    public function testGetFamilyStatus(): void
    {
        $this->assertEquals(
            Data\FamilyStatus::SINGLE(),
            $this->fakeNaturalIdentifier->getFamilyStatus()
        );
    }

    public function testGetSurname(): void
    {
        $this->assertEquals(
            static::SURNAME,
            $this->fakeNaturalIdentifier->getSurname()
        );
    }

    public function testGetInn(): void
    {
        $this->assertEquals(
            static::INN,
            $this->fakeNaturalIdentifier->getInn()
        );
    }

    public function testJsonSerialize(): void
    {
        $this->assertArraySubset(
            [
                'createdAt' => static::CREATED_AT,
                'language' => 'ENG',
                'name' => static::NAME,
                'surname' => static::SURNAME,
                'birthDate' => static::BIRTH_DATE,
                'gender' => 'MAN',
                'inn' => static::INN,
                'patronymic' => static::PATRONYMIC,
                'familyStatus' => 'SINGLE',
                'education' => 'SECONDARY_TECH',
                'nationality' => 'UKRAINE',
                'registrationSpd' => 'PHYSICAL',
                'socialStatus' => 'FULL_TIME',
                'childrenCount' => static::CHILDREN_COUNT
            ],
            $this->fakeNaturalIdentifier->jsonSerialize()
        );
    }

    public function testGetPatronymic(): void
    {
        $this->assertEquals(
            static::PATRONYMIC,
            $this->fakeNaturalIdentifier->getPatronymic()
        );
    }

    public function testGetGender(): void
    {
        $this->assertEquals(
            Data\Gender::MAN(),
            $this->fakeNaturalIdentifier->getGender()
        );
    }

    public function testGetChildrenCount(): void
    {
        $this->assertEquals(
            static::CHILDREN_COUNT,
            $this->fakeNaturalIdentifier->getChildrenCount()
        );
    }

    public function testGetBirthDate(): void
    {
        $this->assertEquals(
            static::BIRTH_DATE,
            Carbon::instance($this->fakeNaturalIdentifier->getBirthDate())->toDateString()
        );
    }
}
