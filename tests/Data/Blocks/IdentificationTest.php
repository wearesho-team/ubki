<?php

namespace Wearesho\Bobra\Ubki\Tests\Data\Blocks;

use Carbon\Carbon;

use PHPUnit\Framework\TestCase;

use Wearesho\Bobra\Ubki\Data;
use Wearesho\Bobra\Ubki\Dictionaries;

/**
 * Class IdentificationTest
 * @package Wearesho\Bobra\Ubki\Tests\Data
 * @coversDefaultClass \Wearesho\Bobra\Ubki\Data\BLocks\Identification
 * @internal
 */
class IdentificationTest extends TestCase
{
    protected const NAME = 'testName';
    protected const CREATED_AT = '2018-03-12';
    protected const INN = '1234567890';
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

    /** @var Data\BLocks\Identification */
    protected $fakeIdentification;

    protected function setUp(): void
    {
        $this->fakeIdentification = new Data\Blocks\Identification(
            new Data\Elements\Credential(
                Dictionaries\Language::RUS(),
                static::NAME,
                static::PATRONYMIC,
                static::SURNAME,
                Carbon::parse(static::BIRTH_DATE),
                new Data\Collections\IdentifiedPersons([
                    new Data\Elements\NaturalPerson(
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
                    ),
                    new Data\Elements\LegalPerson(
                        Carbon::parse(static::CREATED_AT),
                        Dictionaries\Language::RUS(),
                        static::NAME,
                        static::ERGPOU,
                        static::FORM,
                        static::ECONOMY_BRANCH,
                        static::ACTIVITY_TYPE,
                        Carbon::parse(static::EDR_REGISTRATION_DATE),
                        Carbon::parse(static::TAX_REGISTRATION_DATE)
                    ),
                ]),
                new Data\Collections\Documents([
                    new Data\Elements\Document(
                        Carbon::parse(static::CREATED_AT),
                        Dictionaries\Language::RUS(),
                        Dictionaries\DocumentType::DIPLOMA(),
                        static::SERIAL,
                        static::NUMBER,
                        static::ISSUE,
                        Carbon::parse(static::ISSUE_DATE),
                        Carbon::parse(static::TERMIN)
                    ),
                ]),
                new Data\Collections\Addresses([
                    new Data\Elements\Address(
                        Carbon::parse(static::CREATED_AT),
                        Dictionaries\Language::RUS(),
                        Dictionaries\AddressType::REGISTRATION(),
                        static::COUNTRY,
                        static::CITY,
                        static::STREET,
                        static::HOUSE,
                        static::INDEX,
                        static::STATE,
                        static::AREA,
                        Dictionaries\CityType::SETTLEMENT(),
                        static::CORPUS,
                        static::FLAT,
                        static::FULL_ADDRESS
                    ),
                ]),
                static::INN,
                new Data\Collections\Works([
                    new Data\Elements\Work(
                        Carbon::parse(static::CREATED_AT),
                        Dictionaries\Language::RUS(),
                        static::ERGPOU,
                        static::NAME,
                        Dictionaries\IdentifierRank::DIRECTOR(),
                        static::EXPERIENCE,
                        static::INCOME
                    ),
                ]),
                new Data\Collections\Photos([
                    new Data\Elements\Photo(
                        Carbon::parse(static::CREATED_AT),
                        static::PHOTO,
                        static::INN
                    ),
                ]),
                new Data\Collections\LinkedPersons([
                    new Data\Elements\LinkedPerson(
                        static::NAME,
                        Dictionaries\LinkedIdentifierRole::DIRECTOR(),
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
            Data\Blocks\Identification::TAG,
            $this->fakeIdentification->tag()
        );
    }

    public function testJsonSerialize(): void
    {
        $this->assertArraySubset(
            [
                Data\Interfaces\Credential::LANGUAGE => Dictionaries\Language::RUS(),
                Data\Interfaces\Credential::NAME => static::NAME,
                Data\Interfaces\Credential::PATRONYMIC => static::PATRONYMIC,
                Data\Interfaces\Credential::SURNAME => static::SURNAME,
                Data\Interfaces\Credential::BIRTH_DATE => Carbon::parse(static::BIRTH_DATE),
                Data\Interfaces\Credential::INN => static::INN,
                'identifiers' => [
                    new Data\Elements\NaturalPerson(
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
                    ),
                    new Data\Elements\LegalPerson(
                        Carbon::parse(static::CREATED_AT),
                        Dictionaries\Language::RUS(),
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
                    new Data\Elements\Document(
                        Carbon::parse(static::CREATED_AT),
                        Dictionaries\Language::RUS(),
                        Dictionaries\DocumentType::DIPLOMA(),
                        static::SERIAL,
                        static::NUMBER,
                        static::ISSUE,
                        Carbon::parse(static::ISSUE_DATE),
                        Carbon::parse(static::TERMIN)
                    ),
                ],
                'addresses' => [
                    new Data\Elements\Address(
                        Carbon::parse(static::CREATED_AT),
                        Dictionaries\Language::RUS(),
                        Dictionaries\AddressType::REGISTRATION(),
                        static::COUNTRY,
                        static::CITY,
                        static::STREET,
                        static::HOUSE,
                        static::INDEX,
                        static::STATE,
                        static::AREA,
                        Dictionaries\CityType::SETTLEMENT(),
                        static::CORPUS,
                        static::FLAT,
                        static::FULL_ADDRESS
                    ),
                ],
                'works' => [
                    new Data\Elements\Work(
                        Carbon::parse(static::CREATED_AT),
                        Dictionaries\Language::RUS(),
                        static::ERGPOU,
                        static::NAME,
                        Dictionaries\IdentifierRank::DIRECTOR(),
                        static::EXPERIENCE,
                        static::INCOME
                    ),
                ],
                'photos' => [
                    new Data\Elements\Photo(
                        Carbon::parse(static::CREATED_AT),
                        static::PHOTO,
                        static::INN
                    ),
                ],
                'linkedPersons' => [
                    new Data\Elements\LinkedPerson(
                        static::NAME,
                        Dictionaries\LinkedIdentifierRole::DIRECTOR(),
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
        $this->assertEquals(Data\BLocks\Identification::ID, $this->fakeIdentification->getId());
    }

    public function testGetCredential(): void
    {
        $this->assertEquals(
            new Data\Elements\Credential(
                Dictionaries\Language::RUS(),
                static::NAME,
                static::PATRONYMIC,
                static::SURNAME,
                Carbon::parse(static::BIRTH_DATE),
                new Data\Collections\IdentifiedPersons([
                    new Data\Elements\NaturalPerson(
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
                    ),
                    new Data\Elements\LegalPerson(
                        Carbon::parse(static::CREATED_AT),
                        Dictionaries\Language::RUS(),
                        static::NAME,
                        static::ERGPOU,
                        static::FORM,
                        static::ECONOMY_BRANCH,
                        static::ACTIVITY_TYPE,
                        Carbon::parse(static::EDR_REGISTRATION_DATE),
                        Carbon::parse(static::TAX_REGISTRATION_DATE)
                    ),
                ]),
                new Data\Collections\Documents([
                    new Data\Elements\Document(
                        Carbon::parse(static::CREATED_AT),
                        Dictionaries\Language::RUS(),
                        Dictionaries\DocumentType::DIPLOMA(),
                        static::SERIAL,
                        static::NUMBER,
                        static::ISSUE,
                        Carbon::parse(static::ISSUE_DATE),
                        Carbon::parse(static::TERMIN)
                    ),
                ]),
                new Data\Collections\Addresses([
                    new Data\Elements\Address(
                        Carbon::parse(static::CREATED_AT),
                        Dictionaries\Language::RUS(),
                        Dictionaries\AddressType::REGISTRATION(),
                        static::COUNTRY,
                        static::CITY,
                        static::STREET,
                        static::HOUSE,
                        static::INDEX,
                        static::STATE,
                        static::AREA,
                        Dictionaries\CityType::SETTLEMENT(),
                        static::CORPUS,
                        static::FLAT,
                        static::FULL_ADDRESS
                    ),
                ]),
                static::INN,
                new Data\Collections\Works([
                    new Data\Elements\Work(
                        Carbon::parse(static::CREATED_AT),
                        Dictionaries\Language::RUS(),
                        static::ERGPOU,
                        static::NAME,
                        Dictionaries\IdentifierRank::DIRECTOR(),
                        static::EXPERIENCE,
                        static::INCOME
                    ),
                ]),
                new Data\Collections\Photos([
                    new Data\Elements\Photo(
                        Carbon::parse(static::CREATED_AT),
                        static::PHOTO,
                        static::INN
                    ),
                ]),
                new Data\Collections\LinkedPersons([
                    new Data\Elements\LinkedPerson(
                        static::NAME,
                        Dictionaries\LinkedIdentifierRole::DIRECTOR(),
                        Carbon::parse(static::ISSUE_DATE),
                        static::ERGPOU
                    ),
                ])
            ),
            $this->fakeIdentification->getCredential()
        );
    }
}
