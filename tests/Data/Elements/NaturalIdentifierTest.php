<?php

namespace Wearesho\Bobra\Ubki\Tests\Data\Elements;

use Carbon\Carbon;

use Wearesho\Bobra\Ubki\Tests\TestCase;

use Wearesho\Bobra\Ubki\Data\Elements\NaturalPerson;
use Wearesho\Bobra\Ubki\Data\Interfaces;
use Wearesho\Bobra\Ubki\Dictionaries;

/**
 * Class NaturalIdentifierTest
 * @package Wearesho\Bobra\Ubki\Tests\Data\Elements
 * @coversDefaultClass NaturalPerson
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

    /** @var NaturalPerson */
    protected $fakeNaturalIdentifier;

    protected function setUp(): void
    {
        $this->fakeNaturalIdentifier = new NaturalPerson(
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
                Interfaces\IdentifiedPerson::CREATED_AT => Carbon::parse(static::CREATED_AT),
                Interfaces\IdentifiedPerson::LANGUAGE => Dictionaries\Language::KAZ(),
                Interfaces\NaturalPerson::NAME => static::NAME,
                Interfaces\NaturalPerson::SURNAME => static::SURNAME,
                Interfaces\NaturalPerson::BIRTH_DATE => Carbon::parse(static::BIRTH_DATE),
                Interfaces\NaturalPerson::GENDER => Dictionaries\Gender::MAN(),
                Interfaces\NaturalPerson::INN => static::INN,
                Interfaces\NaturalPerson::PATRONYMIC => static::PATRONYMIC,
                Interfaces\NaturalPerson::FAMILY_STATUS => Dictionaries\FamilyStatus::SINGLE(),
                Interfaces\NaturalPerson::EDUCATION => Dictionaries\Education::SECONDARY(),
                Interfaces\NaturalPerson::NATIONALITY => Dictionaries\Nationality::RUSSIAN_FEDERATION(),
                Interfaces\NaturalPerson::REGISTRATION_SPD => Dictionaries\RegistrationSpd::BUSINESS(),
                Interfaces\NaturalPerson::SOCIAL_STATUS => Dictionaries\SocialStatus::STUDENT(),
                Interfaces\NaturalPerson::CHILDREN_COUNT => static::CHILDREN_COUNT,
            ],
            $this->fakeNaturalIdentifier->jsonSerialize()
        );
    }

    public function testTag(): void
    {
        $this->assertEquals(
            Interfaces\NaturalPerson::TAG,
            $this->fakeNaturalIdentifier->tag()
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
