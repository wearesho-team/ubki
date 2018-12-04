<?php

namespace Wearesho\Bobra\Ubki\Tests\Unit\Data\Blocks;

use Carbon\Carbon;
use PHPUnit\Framework\TestCase;
use Wearesho\Bobra\Ubki;

/**
 * Class IdentificationTest
 * @package Wearesho\Bobra\Ubki\Tests\unit\Data\Blocks
 * @coversDefaultClass \Wearesho\Bobra\Ubki\Data\Blocks\Identification
 * @internal
 */
class IdentificationTest extends TestCase
{
    protected const NAME = 'testName';
    protected const CREATED_AT = '2018-03-12';
    protected const INN = 'testInn';
    protected const PATRONYMIC = 'testPatronymic';
    protected const SURNAME = 'testSurname';
    protected const BIRTH_DATE = '1998-03-12';
    protected const CHILDREN_COUNT = 2;
    protected const SERIAL = 'testSerial';
    protected const NUMBER = 'testNumber';
    protected const ISSUE = 'testIssue';
    protected const ISSUE_DATE = '2018-03-14';
    protected const TERMIN = '2020-01-01';
    protected const COUNTRY = 'testCountry';
    protected const CITY = 'testCity';
    protected const STREET = 'testStreet';
    protected const HOUSE = 'testHouse';
    protected const INDEX = 'testIndex';
    protected const STATE = 'testState';
    protected const AREA = 'testArea';
    protected const CORPUS = 'testCorpus';
    protected const FLAT = 'testFlat';
    protected const FULL_ADDRESS = 'testFullAddress';
    protected const ERGPOU = 'testErgpou';
    protected const EXPERIENCE = 10;
    protected const INCOME = 1234.56;
    protected const PHOTO = 'testPhoto';
    protected const FORM = 1;
    protected const ECONOMY_BRANCH = 'testBranch';
    protected const ACTIVITY_TYPE = 'testActivityType';
    protected const EDR_REGISTRATION_DATE = '2017-03-12';
    protected const TAX_REGISTRATION_DATE = '2016-03-12';

    /** @var Ubki\Data\Blocks\Identification */
    protected $fakeIdentification;

    protected function setUp(): void
    {
        $this->fakeIdentification = new Ubki\Data\Blocks\Identification(
            new Ubki\Data\Elements\Credential(
                Ubki\Dictionaries\Language::RUS(),
                static::NAME,
                static::PATRONYMIC,
                static::SURNAME,
                Carbon::parse(static::BIRTH_DATE),
                new Ubki\Data\Collections\IdentifiedPersons([
                    new Ubki\Data\Elements\NaturalPerson(
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
                    ),
                    new Ubki\Data\Elements\LegalPerson(
                        Carbon::parse(static::CREATED_AT),
                        Ubki\Dictionaries\Language::RUS(),
                        static::NAME,
                        static::ERGPOU,
                        static::FORM,
                        static::ECONOMY_BRANCH,
                        static::ACTIVITY_TYPE,
                        Carbon::parse(static::EDR_REGISTRATION_DATE),
                        Carbon::parse(static::TAX_REGISTRATION_DATE)
                    ),
                ]),
                new Ubki\Data\Collections\Documents([
                    new Ubki\Data\Elements\Document(
                        Carbon::parse(static::CREATED_AT),
                        Ubki\Dictionaries\Language::RUS(),
                        Ubki\Dictionaries\DocumentType::DIPLOMA(),
                        static::SERIAL,
                        static::NUMBER,
                        static::ISSUE,
                        Carbon::parse(static::ISSUE_DATE),
                        Carbon::parse(static::TERMIN)
                    ),
                ]),
                new Ubki\Data\Collections\Addresses([
                    new Ubki\Data\Elements\Address(
                        Carbon::parse(static::CREATED_AT),
                        Ubki\Dictionaries\Language::RUS(),
                        Ubki\Dictionaries\AddressType::REGISTRATION(),
                        static::COUNTRY,
                        static::CITY,
                        static::STREET,
                        static::HOUSE,
                        static::INDEX,
                        static::STATE,
                        static::AREA,
                        Ubki\Dictionaries\CityType::SETTLEMENT(),
                        static::CORPUS,
                        static::FLAT,
                        static::FULL_ADDRESS
                    ),
                ]),
                static::INN,
                new Ubki\Data\Collections\Works([
                    new Ubki\Data\Elements\Work(
                        Carbon::parse(static::CREATED_AT),
                        Ubki\Dictionaries\Language::RUS(),
                        static::ERGPOU,
                        static::NAME,
                        Ubki\Dictionaries\IdentifierRank::DIRECTOR(),
                        static::EXPERIENCE,
                        static::INCOME
                    ),
                ]),
                new Ubki\Data\Collections\Photos([
                    new Ubki\Data\Elements\Photo(
                        Carbon::parse(static::CREATED_AT),
                        static::PHOTO,
                        static::INN
                    ),
                ]),
                new Ubki\Data\Collections\LinkedPersons([
                    new Ubki\Data\Elements\LinkedPerson(
                        static::NAME,
                        Ubki\Dictionaries\LinkedIdentifierRole::DIRECTOR(),
                        Carbon::parse(static::ISSUE_DATE),
                        static::ERGPOU
                    ),
                ])
            )
        );
    }

    public function testTag(): void
    {
        $this->assertEquals(
            Ubki\Data\Blocks\Identification::TAG,
            $this->fakeIdentification->tag()
        );
    }

    public function testJsonSerialize(): void
    {
        $this->assertArraySubset(
            [
                Ubki\Data\Interfaces\Credential::LANGUAGE => Ubki\Dictionaries\Language::RUS(),
                Ubki\Data\Interfaces\Credential::NAME => static::NAME,
                Ubki\Data\Interfaces\Credential::PATRONYMIC => static::PATRONYMIC,
                Ubki\Data\Interfaces\Credential::SURNAME => static::SURNAME,
                Ubki\Data\Interfaces\Credential::BIRTH_DATE => Carbon::parse(static::BIRTH_DATE),
                Ubki\Data\Interfaces\Credential::INN => static::INN,
                'identifiers' => [
                    new Ubki\Data\Elements\NaturalPerson(
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
                    ),
                    new Ubki\Data\Elements\LegalPerson(
                        Carbon::parse(static::CREATED_AT),
                        Ubki\Dictionaries\Language::RUS(),
                        static::NAME,
                        static::ERGPOU,
                        static::FORM,
                        static::ECONOMY_BRANCH,
                        static::ACTIVITY_TYPE,
                        Carbon::parse(static::EDR_REGISTRATION_DATE),
                        Carbon::parse(static::TAX_REGISTRATION_DATE)
                    ),
                ],
                'documents' => [
                    new Ubki\Data\Elements\Document(
                        Carbon::parse(static::CREATED_AT),
                        Ubki\Dictionaries\Language::RUS(),
                        Ubki\Dictionaries\DocumentType::DIPLOMA(),
                        static::SERIAL,
                        static::NUMBER,
                        static::ISSUE,
                        Carbon::parse(static::ISSUE_DATE),
                        Carbon::parse(static::TERMIN)
                    ),
                ],
                'addresses' => [
                    new Ubki\Data\Elements\Address(
                        Carbon::parse(static::CREATED_AT),
                        Ubki\Dictionaries\Language::RUS(),
                        Ubki\Dictionaries\AddressType::REGISTRATION(),
                        static::COUNTRY,
                        static::CITY,
                        static::STREET,
                        static::HOUSE,
                        static::INDEX,
                        static::STATE,
                        static::AREA,
                        Ubki\Dictionaries\CityType::SETTLEMENT(),
                        static::CORPUS,
                        static::FLAT,
                        static::FULL_ADDRESS
                    ),
                ],
                'works' => [
                    new Ubki\Data\Elements\Work(
                        Carbon::parse(static::CREATED_AT),
                        Ubki\Dictionaries\Language::RUS(),
                        static::ERGPOU,
                        static::NAME,
                        Ubki\Dictionaries\IdentifierRank::DIRECTOR(),
                        static::EXPERIENCE,
                        static::INCOME
                    ),
                ],
                'photos' => [
                    new Ubki\Data\Elements\Photo(
                        Carbon::parse(static::CREATED_AT),
                        static::PHOTO,
                        static::INN
                    ),
                ],
                'linkedPersons' => [
                    new Ubki\Data\Elements\LinkedPerson(
                        static::NAME,
                        Ubki\Dictionaries\LinkedIdentifierRole::DIRECTOR(),
                        Carbon::parse(static::ISSUE_DATE),
                        static::ERGPOU
                    ),
                ],
            ],
            $this->fakeIdentification->jsonSerialize()
        );
    }

    public function testId(): void
    {
        $this->assertEquals(Ubki\Data\Blocks\Identification::ID, $this->fakeIdentification->getId());
    }

    public function testGetCredential(): void
    {
        $this->assertEquals(
            new Ubki\Data\Elements\Credential(
                Ubki\Dictionaries\Language::RUS(),
                static::NAME,
                static::PATRONYMIC,
                static::SURNAME,
                Carbon::parse(static::BIRTH_DATE),
                new Ubki\Data\Collections\IdentifiedPersons([
                    new Ubki\Data\Elements\NaturalPerson(
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
                    ),
                    new Ubki\Data\Elements\LegalPerson(
                        Carbon::parse(static::CREATED_AT),
                        Ubki\Dictionaries\Language::RUS(),
                        static::NAME,
                        static::ERGPOU,
                        static::FORM,
                        static::ECONOMY_BRANCH,
                        static::ACTIVITY_TYPE,
                        Carbon::parse(static::EDR_REGISTRATION_DATE),
                        Carbon::parse(static::TAX_REGISTRATION_DATE)
                    ),
                ]),
                new Ubki\Data\Collections\Documents([
                    new Ubki\Data\Elements\Document(
                        Carbon::parse(static::CREATED_AT),
                        Ubki\Dictionaries\Language::RUS(),
                        Ubki\Dictionaries\DocumentType::DIPLOMA(),
                        static::SERIAL,
                        static::NUMBER,
                        static::ISSUE,
                        Carbon::parse(static::ISSUE_DATE),
                        Carbon::parse(static::TERMIN)
                    ),
                ]),
                new Ubki\Data\Collections\Addresses([
                    new Ubki\Data\Elements\Address(
                        Carbon::parse(static::CREATED_AT),
                        Ubki\Dictionaries\Language::RUS(),
                        Ubki\Dictionaries\AddressType::REGISTRATION(),
                        static::COUNTRY,
                        static::CITY,
                        static::STREET,
                        static::HOUSE,
                        static::INDEX,
                        static::STATE,
                        static::AREA,
                        Ubki\Dictionaries\CityType::SETTLEMENT(),
                        static::CORPUS,
                        static::FLAT,
                        static::FULL_ADDRESS
                    ),
                ]),
                static::INN,
                new Ubki\Data\Collections\Works([
                    new Ubki\Data\Elements\Work(
                        Carbon::parse(static::CREATED_AT),
                        Ubki\Dictionaries\Language::RUS(),
                        static::ERGPOU,
                        static::NAME,
                        Ubki\Dictionaries\IdentifierRank::DIRECTOR(),
                        static::EXPERIENCE,
                        static::INCOME
                    ),
                ]),
                new Ubki\Data\Collections\Photos([
                    new Ubki\Data\Elements\Photo(
                        Carbon::parse(static::CREATED_AT),
                        static::PHOTO,
                        static::INN
                    ),
                ]),
                new Ubki\Data\Collections\LinkedPersons([
                    new Ubki\Data\Elements\LinkedPerson(
                        static::NAME,
                        Ubki\Dictionaries\LinkedIdentifierRole::DIRECTOR(),
                        Carbon::parse(static::ISSUE_DATE),
                        static::ERGPOU
                    ),
                ])
            ),
            $this->fakeIdentification->getCredential()
        );
    }
}
