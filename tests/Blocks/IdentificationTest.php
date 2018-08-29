<?php

namespace Wearesho\Bobra\Ubki\Tests\Blocks;

use Carbon\Carbon;

use PHPUnit\Framework\TestCase;

use Wearesho\Bobra\Ubki\Blocks;
use Wearesho\Bobra\Ubki\References;

/**
 * Class IdentificationTest
 * @package Wearesho\Bobra\Ubki\Tests\Blocks
 * @coversDefaultClass \Wearesho\Bobra\Ubki\Blocks\Identification
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

    /** @var Blocks\Identification */
    protected $fakeIdentification;

    protected function setUp(): void
    {
        $this->fakeIdentification = new Blocks\Identification(
            new Blocks\Entities\Credential(
                References\Language::RUS(),
                static::NAME,
                static::PATRONYMIC,
                static::SURNAME,
                Carbon::parse(static::BIRTH_DATE),
                new Blocks\Collections\Identifiers([
                    new Blocks\Entities\NaturalIdentifier(
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
                    new Blocks\Entities\LegalIdentifier(
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
                new Blocks\Collections\Documents([
                    new Blocks\Entities\Document(
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
                new Blocks\Collections\Addresses([
                    new Blocks\Entities\Address(
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
                new Blocks\Collections\Works([
                    new Blocks\Entities\Work(
                        Carbon::parse(static::CREATED_AT),
                        References\Language::RUS(),
                        static::ERGPOU,
                        static::NAME,
                        References\IdentifierRank::DIRECTOR(),
                        static::EXPERIENCE,
                        static::INCOME
                    ),
                ]),
                new Blocks\Collections\Photos([
                    new Blocks\Entities\Photo(
                        Carbon::parse(static::CREATED_AT),
                        static::PHOTO,
                        static::INN
                    ),
                ]),
                new Blocks\Collections\LinkedPersons([
                    new Blocks\Entities\LinkedPerson(
                        static::NAME,
                        References\LinkedIdentifierRole::DIRECTOR(),
                        Carbon::parse(static::ISSUE_DATE),
                        static::ERGPOU
                    ),
                ])
            )
        );
    }

    public function testId(): void
    {
        $this->assertEquals(Blocks\Identification::ID, $this->fakeIdentification->getId());
    }

    public function testGetCredential(): void
    {
        $this->assertEquals(
            new Blocks\Entities\Credential(
                References\Language::RUS(),
                static::NAME,
                static::PATRONYMIC,
                static::SURNAME,
                Carbon::parse(static::BIRTH_DATE),
                new Blocks\Collections\Identifiers([
                    new Blocks\Entities\NaturalIdentifier(
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
                    new Blocks\Entities\LegalIdentifier(
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
                new Blocks\Collections\Documents([
                    new Blocks\Entities\Document(
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
                new Blocks\Collections\Addresses([
                    new Blocks\Entities\Address(
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
                new Blocks\Collections\Works([
                    new Blocks\Entities\Work(
                        Carbon::parse(static::CREATED_AT),
                        References\Language::RUS(),
                        static::ERGPOU,
                        static::NAME,
                        References\IdentifierRank::DIRECTOR(),
                        static::EXPERIENCE,
                        static::INCOME
                    ),
                ]),
                new Blocks\Collections\Photos([
                    new Blocks\Entities\Photo(
                        Carbon::parse(static::CREATED_AT),
                        static::PHOTO,
                        static::INN
                    ),
                ]),
                new Blocks\Collections\LinkedPersons([
                    new Blocks\Entities\LinkedPerson(
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
