<?php

namespace Wearesho\Bobra\Ubki\Tests\Unit\Data\Elements;

use Carbon\Carbon;
use PHPUnit\Framework\TestCase;
use Wearesho\Bobra\Ubki;

/**
 * Class NaturalIdentifierTest
 * @package Wearesho\Bobra\Ubki\Tests\Unit\Data\Elements
 * @coversDefaultClass \Wearesho\Bobra\Ubki\Data\Elements\NaturalPerson
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

    /** @var Ubki\Data\Elements\NaturalPerson */
    protected $fakeNaturalIdentifier;

    protected function setUp(): void
    {
        $this->fakeNaturalIdentifier = new Ubki\Data\Elements\NaturalPerson(
            Carbon::parse(static::CREATED_AT),
            Ubki\Dictionaries\Language::KAZ(),
            static::NAME,
            static::SURNAME,
            Carbon::parse(static::BIRTH_DATE),
            Ubki\Dictionaries\Gender::MAN(),
            static::INN,
            static::PATRONYMIC,
            Ubki\Dictionaries\FamilyStatus::SINGLE(),
            Ubki\Dictionaries\Education::SECONDARY(),
            Ubki\Dictionaries\Nationality::RUSSIAN_FEDERATION(),
            Ubki\Dictionaries\RegistrationSpd::BUSINESS(),
            Ubki\Dictionaries\SocialStatus::STUDENT(),
            static::CHILDREN_COUNT
        );
    }

    public function testJsonSerialize(): void
    {
        $this->assertArraySubset(
            [
                Ubki\Data\Interfaces\IdentifiedPerson::CREATED_AT => Carbon::parse(static::CREATED_AT),
                Ubki\Data\Interfaces\IdentifiedPerson::LANGUAGE => Ubki\Dictionaries\Language::KAZ(),
                Ubki\Data\Interfaces\NaturalPerson::NAME => static::NAME,
                Ubki\Data\Interfaces\NaturalPerson::SURNAME => static::SURNAME,
                Ubki\Data\Interfaces\NaturalPerson::BIRTH_DATE => Carbon::parse(static::BIRTH_DATE),
                Ubki\Data\Interfaces\NaturalPerson::GENDER => Ubki\Dictionaries\Gender::MAN(),
                Ubki\Data\Interfaces\NaturalPerson::INN => static::INN,
                Ubki\Data\Interfaces\NaturalPerson::PATRONYMIC => static::PATRONYMIC,
                Ubki\Data\Interfaces\NaturalPerson::FAMILY_STATUS => Ubki\Dictionaries\FamilyStatus::SINGLE(),
                Ubki\Data\Interfaces\NaturalPerson::EDUCATION => Ubki\Dictionaries\Education::SECONDARY(),
                Ubki\Data\Interfaces\NaturalPerson::NATIONALITY => Ubki\Dictionaries\Nationality::RUSSIAN_FEDERATION(),
                Ubki\Data\Interfaces\NaturalPerson::REGISTRATION_SPD => Ubki\Dictionaries\RegistrationSpd::BUSINESS(),
                Ubki\Data\Interfaces\NaturalPerson::SOCIAL_STATUS => Ubki\Dictionaries\SocialStatus::STUDENT(),
                Ubki\Data\Interfaces\NaturalPerson::CHILDREN_COUNT => static::CHILDREN_COUNT,
            ],
            $this->fakeNaturalIdentifier->jsonSerialize()
        );
    }

    public function testTag(): void
    {
        $this->assertEquals(
            Ubki\Data\Interfaces\NaturalPerson::TAG,
            $this->fakeNaturalIdentifier->tag()
        );
    }

    public function testGetLanguage(): void
    {
        $this->assertEquals(
            Ubki\Dictionaries\Language::KAZ(),
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
            Ubki\Dictionaries\Gender::MAN(),
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
            Ubki\Dictionaries\Nationality::RUSSIAN_FEDERATION(),
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
            Ubki\Dictionaries\SocialStatus::STUDENT(),
            $this->fakeNaturalIdentifier->getSocialStatus()
        );
    }

    public function testGetFamilyStatus(): void
    {
        $this->assertEquals(
            Ubki\Dictionaries\FamilyStatus::SINGLE(),
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
            Ubki\Dictionaries\Education::SECONDARY(),
            $this->fakeNaturalIdentifier->getEducation()
        );
    }

    public function testGetRegistrationSpd(): void
    {
        $this->assertEquals(
            Ubki\Dictionaries\RegistrationSpd::BUSINESS(),
            $this->fakeNaturalIdentifier->getRegistrationSpd()
        );
    }
}
