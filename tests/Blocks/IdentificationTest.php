<?php

namespace Wearesho\Bobra\Ubki\Tests\Blocks;

use Carbon\Carbon;

use PHPUnit\Framework\TestCase;

use Wearesho\Bobra\Ubki\Data;
use Wearesho\Bobra\Ubki\References;

/**
 * Class IdentificationTest
 * @package Wearesho\Bobra\Ubki\Tests\Data
 * @coversDefaultClass \Wearesho\Bobra\Ubki\Data\Identification
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

    /** @var Data\Identification */
    protected $fakeIdentification;

    protected function setUp(): void
    {
        $this->fakeIdentification = new Data\Identification(
            new Data\Elements\Credential(
                References\Language::RUS(),
                static::NAME,
                static::PATRONYMIC,
                static::SURNAME,
                Carbon::parse(static::BIRTH_DATE),
                new Data\Collections\Identifiers([
                    new Data\Elements\NaturalIdentifier(
                        Carbon::parse(static::CREATED_AT),
                        References\Language::KAZ(),
                        static::NAME,
                        static::SURNAME,
                        Carbon::parse(static::BIRTH_DATE),
                        References\Gender::MAN(),
                        static::INN,
                        static::PATRONYMIC,
                        References\FamilyStatus::SINGLE(),
                        References\Education::SECONDARY(),
                        References\Nationality::RUSSIAN_FEDERATION(),
                        References\RegistrationSpd::BUSINESS(),
                        References\SocialStatus::STUDENT(),
                        static::CHILDREN_COUNT
                    ),
                    new Data\Elements\LegalIdentifier(
                        Carbon::parse(static::CREATED_AT),
                        References\Language::RUS(),
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
                        References\Language::RUS(),
                        References\DocumentType::DIPLOMA(),
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
                        References\Language::RUS(),
                        References\AddressType::REGISTRATION(),
                        static::COUNTRY,
                        static::CITY,
                        static::STREET,
                        static::HOUSE,
                        static::INDEX,
                        static::STATE,
                        static::AREA,
                        References\CityType::SETTLEMENT(),
                        static::CORPUS,
                        static::FLAT,
                        static::FULL_ADDRESS
                    ),
                ]),
                static::INN,
                new Data\Collections\Works([
                    new Data\Elements\Work(
                        Carbon::parse(static::CREATED_AT),
                        References\Language::RUS(),
                        static::ERGPOU,
                        static::NAME,
                        References\IdentifierRank::DIRECTOR(),
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
                        References\LinkedIdentifierRole::DIRECTOR(),
                        Carbon::parse(static::ISSUE_DATE),
                        static::ERGPOU
                    ),
                ])
            )
        );
    }

    public function testJsonSerialize(): void
    {
        $this->assertArraySubset(
            [
                'credential' => [
                    'language' => References\Language::RUS()->getKey(),
                    'name' => static::NAME,
                    'patronymic' => static::PATRONYMIC,
                    'surname' => static::SURNAME,
                    'birthDate' => static::BIRTH_DATE,
                    'identifiers' => [
                        [
                            'createdAt' => static::CREATED_AT,
                            'language' => References\Language::KAZ()->getKey(),
                            'name' => static::NAME,
                            'surname' => static::SURNAME,
                            'birthDate' => static::BIRTH_DATE,
                            'gender' => References\Gender::MAN()->getKey(),
                            'inn' => static::INN,
                            'patronymic' => static::PATRONYMIC,
                            'familyStatus' => References\FamilyStatus::SINGLE()->getKey(),
                            'education' => References\Education::SECONDARY()->getKey(),
                            'nationality' => References\Nationality::RUSSIAN_FEDERATION()->getKey(),
                            'registrationSpd' => References\RegistrationSpd::BUSINESS()->getKey(),
                            'socialStatus' => References\SocialStatus::STUDENT()->getKey(),
                            'childrenCount' => static::CHILDREN_COUNT,
                        ],
                        [
                            'createdAt' => static::CREATED_AT,
                            'language' => References\Language::RUS()->getKey(),
                            'name' => static::NAME,
                            'ergpou' => static::ERGPOU,
                            'form' => static::FORM,
                            'economyBranch' => static::ECONOMY_BRANCH,
                            'activityType' => static::ACTIVITY_TYPE,
                            'edrRegistrationDate' => static::EDR_REGISTRATION_DATE,
                            'taxRegistrationDate' => static::TAX_REGISTRATION_DATE
                        ],
                    ],
                    'documents' => [
                        [
                            'createdAt' => static::CREATED_AT,
                            'language' => References\Language::RUS()->getKey(),
                            'type' => References\DocumentType::DIPLOMA()->getKey(),
                            'serial' => static::SERIAL,
                            'number' => static::NUMBER,
                            'issue' => static::ISSUE,
                            'issueDate' => static::ISSUE_DATE,
                            'termin' => static::TERMIN,
                        ],
                    ],
                    'addresses' => [
                        [
                            'createdAt' => static::CREATED_AT,
                            'language' => References\Language::RUS()->getKey(),
                            'type' => References\AddressType::REGISTRATION()->getKey(),
                            'country' => static::COUNTRY,
                            'city' => static::CITY,
                            'street' => static::STREET,
                            'house' => static::HOUSE,
                            'index' => static::INDEX,
                            'state' => static::STATE,
                            'area' => static::AREA,
                            'cityType' => References\CityType::SETTLEMENT()->getKey(),
                            'corpus' => static::CORPUS,
                            'flat' => static::FLAT,
                            'fullAddress' => static::FULL_ADDRESS
                        ],
                    ],
                    'inn' => static::INN,
                    'works' => [
                        [
                            'createdAt' => static::CREATED_AT,
                            'language' => References\Language::RUS()->getKey(),
                            'ergpou' => static::ERGPOU,
                            'name' => static::NAME,
                            'rank' => References\IdentifierRank::DIRECTOR()->getKey(),
                            'experience' => static::EXPERIENCE,
                            'income' => static::INCOME
                        ],
                    ],
                    'photos' => [
                        [
                            'createdAt' => static::CREATED_AT,
                            'inn' => static::INN,
                            'photo' => static::PHOTO
                        ],
                    ],
                    'linkedPersons' => [
                        [
                            'name' => static::NAME,
                            'role' => References\LinkedIdentifierRole::DIRECTOR()->getKey(),
                            'issueDate' => static::ISSUE_DATE,
                            'ergpou' => static::ERGPOU
                        ],
                    ],
                ],
            ],
            $this->fakeIdentification->jsonSerialize()
        );
    }

    public function testId(): void
    {
        $this->assertEquals(Data\Identification::ID, $this->fakeIdentification->getId());
    }

    public function testGetCredential(): void
    {
        $this->assertEquals(
            new Data\Elements\Credential(
                References\Language::RUS(),
                static::NAME,
                static::PATRONYMIC,
                static::SURNAME,
                Carbon::parse(static::BIRTH_DATE),
                new Data\Collections\Identifiers([
                    new Data\Elements\NaturalIdentifier(
                        Carbon::parse(static::CREATED_AT),
                        References\Language::KAZ(),
                        static::NAME,
                        static::SURNAME,
                        Carbon::parse(static::BIRTH_DATE),
                        References\Gender::MAN(),
                        static::INN,
                        static::PATRONYMIC,
                        References\FamilyStatus::SINGLE(),
                        References\Education::SECONDARY(),
                        References\Nationality::RUSSIAN_FEDERATION(),
                        References\RegistrationSpd::BUSINESS(),
                        References\SocialStatus::STUDENT(),
                        static::CHILDREN_COUNT
                    ),
                    new Data\Elements\LegalIdentifier(
                        Carbon::parse(static::CREATED_AT),
                        References\Language::RUS(),
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
                        References\Language::RUS(),
                        References\DocumentType::DIPLOMA(),
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
                        References\Language::RUS(),
                        References\AddressType::REGISTRATION(),
                        static::COUNTRY,
                        static::CITY,
                        static::STREET,
                        static::HOUSE,
                        static::INDEX,
                        static::STATE,
                        static::AREA,
                        References\CityType::SETTLEMENT(),
                        static::CORPUS,
                        static::FLAT,
                        static::FULL_ADDRESS
                    ),
                ]),
                static::INN,
                new Data\Collections\Works([
                    new Data\Elements\Work(
                        Carbon::parse(static::CREATED_AT),
                        References\Language::RUS(),
                        static::ERGPOU,
                        static::NAME,
                        References\IdentifierRank::DIRECTOR(),
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
                        References\LinkedIdentifierRole::DIRECTOR(),
                        Carbon::parse(static::ISSUE_DATE),
                        static::ERGPOU
                    ),
                ])
            ),
            $this->fakeIdentification->getCredential()
        );
    }
}
