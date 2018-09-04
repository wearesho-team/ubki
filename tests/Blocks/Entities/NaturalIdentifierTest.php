<?php

namespace Wearesho\Bobra\Ubki\Tests\Blocks\Entities;

use Carbon\Carbon;

use PHPUnit\Framework\TestCase;

use Wearesho\Bobra\Ubki\Data\Elements\NaturalIdentifier;
use Wearesho\Bobra\Ubki\Dictionaries;

/**
 * Class NaturalIdentifierTest
 * @package Wearesho\Bobra\Ubki\Tests\Data\Elements
 * @coversDefaultClass NaturalIdentifier
 * @internal
 */
class NaturalIdentifierTest extends TestCase
{
    protected const CREATED_AT = '2018-03-12';
    protected const NAME = 'testName';
    protected const SURNAME = 'testSurname';
    protected const BIRTH_DATE = '1998-03-12';
    protected const INN = 'testInn';
    protected const PATRONYMIC = 'testPatronymic';
    protected const CHILDREN_COUNT = 2;

    /** @var NaturalIdentifier */
    protected $fakeNaturalIdentifier;

    protected function setUp(): void
    {
        $this->fakeNaturalIdentifier = new NaturalIdentifier(
            Carbon::parse(static::CREATED_AT),
            Dictionaries\Language::KAZ(),
            static::NAME,
            static::SURNAME,
            Carbon::parse(static::BIRTH_DATE),
            Dictionaries\Gender::MAN(),
            static::INN,
            static::PATRONYMIC,
            Dictionaries\FamilyStatus::SINGLE(),
            Dictionaries\Education::SECONDARY(),
            Dictionaries\Nationality::RUSSIAN_FEDERATION(),
            Dictionaries\RegistrationSpd::BUSINESS(),
            Dictionaries\SocialStatus::STUDENT(),
            static::CHILDREN_COUNT
        );
    }

    public function testJsonSerialize(): void
    {
        $this->assertArraySubset(
            [
                'createdAt' => static::CREATED_AT,
                'language' => Dictionaries\Language::KAZ()->getKey(),
                'name' => static::NAME,
                'surname' => static::SURNAME,
                'birthDate' => static::BIRTH_DATE,
                'gender' => Dictionaries\Gender::MAN()->getKey(),
                'inn' => static::INN,
                'patronymic' => static::PATRONYMIC,
                'familyStatus' => Dictionaries\FamilyStatus::SINGLE()->getKey(),
                'education' => Dictionaries\Education::SECONDARY()->getKey(),
                'nationality' => Dictionaries\Nationality::RUSSIAN_FEDERATION()->getKey(),
                'registrationSpd' => Dictionaries\RegistrationSpd::BUSINESS()->getKey(),
                'socialStatus' => Dictionaries\SocialStatus::STUDENT()->getKey(),
                'childrenCount' => static::CHILDREN_COUNT,
            ],
            $this->fakeNaturalIdentifier->jsonSerialize()
        );
    }

    public function testGetLanguage(): void
    {
        $this->assertEquals(
            Dictionaries\Language::KAZ(),
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

    public function testGetCreatedAt(): void
    {
        $this->assertEquals(
            static::CREATED_AT,
            Carbon::instance($this->fakeNaturalIdentifier->getCreatedAt())->toDateString()
        );
    }

    public function testGetGender(): void
    {
        $this->assertEquals(
            Dictionaries\Gender::MAN(),
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

    public function testGetNationality(): void
    {
        $this->assertEquals(
            Dictionaries\Nationality::RUSSIAN_FEDERATION(),
            $this->fakeNaturalIdentifier->getNationality()
        );
    }

    public function testGetSurname(): void
    {
        $this->assertEquals(
            static::SURNAME,
            $this->fakeNaturalIdentifier->getSurname()
        );
    }

    public function testGetBirthDate(): void
    {
        $this->assertEquals(
            static::BIRTH_DATE,
            Carbon::instance($this->fakeNaturalIdentifier->getBirthDate())->toDateString()
        );
    }

    public function testGetSocialStatus(): void
    {
        $this->assertEquals(
            Dictionaries\SocialStatus::STUDENT(),
            $this->fakeNaturalIdentifier->getSocialStatus()
        );
    }

    public function testGetFamilyStatus(): void
    {
        $this->assertEquals(
            Dictionaries\FamilyStatus::SINGLE(),
            $this->fakeNaturalIdentifier->getFamilyStatus()
        );
    }

    public function testGetInn(): void
    {
        $this->assertEquals(
            static::INN,
            $this->fakeNaturalIdentifier->getInn()
        );
    }

    public function testGetPatronymic(): void
    {
        $this->assertEquals(
            static::PATRONYMIC,
            $this->fakeNaturalIdentifier->getPatronymic()
        );
    }

    public function testGetEducation(): void
    {
        $this->assertEquals(
            Dictionaries\Education::SECONDARY(),
            $this->fakeNaturalIdentifier->getEducation()
        );
    }

    public function testGetRegistrationSpd(): void
    {
        $this->assertEquals(
            Dictionaries\RegistrationSpd::BUSINESS(),
            $this->fakeNaturalIdentifier->getRegistrationSpd()
        );
    }
}
