<?php

declare(strict_types=1);

namespace Wearesho\Bobra\Ubki\Tests\Unit\Data;

use Carbon\Carbon;
use PHPUnit\Framework\TestCase;
use Wearesho\Bobra\Ubki;

/**
 * Class CredentialTest
 * @package Wearesho\Bobra\Ubki\Tests\Unit\Data
 */
class CredentialTest extends TestCase
{
    protected const NAME = 'name';
    protected const PATRONYMIC = 'patronymic';
    protected const SURNAME = 'surname';
    protected const BIRTH_DATE = '2010-03-12';
    protected const CREATED_AT = '2018-03-12';
    protected const INN = '1234567890';
    protected const DOCUMENT_SERIAL = 'AF';
    protected const DOCUMENT_NUMBER = '123456';
    protected const DOCUMENT_ISSUE = 'issue';
    protected const DOCUMENT_ISSUE_DATE = '2018-03-12';
    protected const DOCUMENT_TERMIN = '2020-03-12';
    protected const COUNTRY = 'ukraine';
    protected const CITY = 'testCity';
    protected const STREET = 'testStreet';
    protected const HOUSE = 'testHouse';
    protected const INDEX = '61166';
    protected const STATE = 'testState';
    protected const AREA = 'testArea';
    protected const CORPUS = 'testCorpus';
    protected const FLAT = 'testFlat';
    protected const FULL_ADDRESS = 'testFullAddress';
    protected const EGRPOU = '12345678';
    protected const WORK_NAME = 'workname';
    protected const PHOTO_URI = 'uri';
    protected const LINKED_NAME = 'linkedname';
    protected const LINKED_ISSUE_DATE = '2018-03-12';
    protected const LINKED_EGRPOU = '12345678';

    /** @var Ubki\Data\Credential */
    protected $credential;

    protected function setUp(): void
    {
        $this->credential = new Ubki\Data\Credential(
            Ubki\Dictionary\Language::ENG(),
            static::NAME,
            static::PATRONYMIC,
            static::SURNAME,
            Carbon::parse(static::BIRTH_DATE),
            new Ubki\Data\Collection\IdentifiedPerson([
                new Ubki\Data\NaturalPerson(
                    Carbon::parse(static::CREATED_AT),
                    Ubki\Dictionary\Language::ENG(),
                    static::NAME,
                    static::SURNAME,
                    Carbon::parse(static::BIRTH_DATE),
                    Ubki\Dictionary\Gender::MAN(),
                    static::INN,
                    static::PATRONYMIC,
                    Ubki\Dictionary\FamilyStatus::WIDOW(),
                    Ubki\Dictionary\Education::ACADEMIC(),
                    Ubki\Dictionary\Nationality::ARMENIA(),
                    Ubki\Dictionary\RegistrationSpd::BUSINESS(),
                    Ubki\Dictionary\SocialStatus::OTHER(),
                    1
                ),
            ]),
            new Ubki\Data\Collection\Document([
                new Ubki\Data\Document(
                    Carbon::parse(static::CREATED_AT),
                    Ubki\Dictionary\Language::ENG(),
                    Ubki\Dictionary\Document::PASSPORT(),
                    static::DOCUMENT_SERIAL,
                    static::DOCUMENT_NUMBER,
                    static::DOCUMENT_ISSUE,
                    Carbon::parse(static::DOCUMENT_ISSUE_DATE),
                    Carbon::parse(static::DOCUMENT_TERMIN)
                ),
            ]),
            new Ubki\Data\Collection\Address([
                new Ubki\Data\Address(
                    Carbon::parse(static::CREATED_AT),
                    Ubki\Dictionary\Language::ENG(),
                    Ubki\Dictionary\Address::HOME(),
                    static::COUNTRY,
                    static::CITY,
                    static::STREET,
                    static::HOUSE,
                    static::INDEX,
                    static::STATE,
                    static::AREA,
                    Ubki\Dictionary\City::TOWN(),
                    static::CORPUS,
                    static::FLAT,
                    static::FULL_ADDRESS
                ),
            ]),
            static::INN,
            new Ubki\Data\Collection\Work([
                new Ubki\Data\Work(
                    Carbon::parse(static::CREATED_AT),
                    Ubki\Dictionary\Language::ENG(),
                    static::EGRPOU,
                    static::WORK_NAME,
                    Ubki\Dictionary\IdentifierRank::DIRECTOR(),
                    10,
                    2500.50
                ),
            ]),
            new Ubki\Data\Collection\Photo([
                new Ubki\Data\Photo(
                    Carbon::parse(static::CREATED_AT),
                    static::PHOTO_URI,
                    static::INN
                ),
            ]),
            new Ubki\Data\Collection\LinkedPerson([
                new Ubki\Data\LinkedPerson(
                    static::LINKED_NAME,
                    Ubki\Dictionary\LinkedIdentifierRole::DIRECTOR(),
                    Carbon::parse(static::LINKED_ISSUE_DATE),
                    static::LINKED_EGRPOU
                ),
            ])
        );
    }

    public function testJsonSerialize(): void
    {
        $this->assertEquals(
            [
                'language' => Ubki\Dictionary\Language::ENG(),
                'name' => static::NAME,
                'patronymic' => static::PATRONYMIC,
                'surname' => static::SURNAME,
                'birthDate' => Carbon::parse(static::BIRTH_DATE),
                'identifiers' => new Ubki\Data\Collection\IdentifiedPerson([
                    new Ubki\Data\NaturalPerson(
                        Carbon::parse(static::CREATED_AT),
                        Ubki\Dictionary\Language::ENG(),
                        static::NAME,
                        static::SURNAME,
                        Carbon::parse(static::BIRTH_DATE),
                        Ubki\Dictionary\Gender::MAN(),
                        static::INN,
                        static::PATRONYMIC,
                        Ubki\Dictionary\FamilyStatus::WIDOW(),
                        Ubki\Dictionary\Education::ACADEMIC(),
                        Ubki\Dictionary\Nationality::ARMENIA(),
                        Ubki\Dictionary\RegistrationSpd::BUSINESS(),
                        Ubki\Dictionary\SocialStatus::OTHER(),
                        1
                    ),
                ]),
                'documents' => new Ubki\Data\Collection\Document([
                    new Ubki\Data\Document(
                        Carbon::parse(static::CREATED_AT),
                        Ubki\Dictionary\Language::ENG(),
                        Ubki\Dictionary\Document::PASSPORT(),
                        static::DOCUMENT_SERIAL,
                        static::DOCUMENT_NUMBER,
                        static::DOCUMENT_ISSUE,
                        Carbon::parse(static::DOCUMENT_ISSUE_DATE),
                        Carbon::parse(static::DOCUMENT_TERMIN)
                    ),
                ]),
                'addresses' => new Ubki\Data\Collection\Address([
                    new Ubki\Data\Address(
                        Carbon::parse(static::CREATED_AT),
                        Ubki\Dictionary\Language::ENG(),
                        Ubki\Dictionary\Address::HOME(),
                        static::COUNTRY,
                        static::CITY,
                        static::STREET,
                        static::HOUSE,
                        static::INDEX,
                        static::STATE,
                        static::AREA,
                        Ubki\Dictionary\City::TOWN(),
                        static::CORPUS,
                        static::FLAT,
                        static::FULL_ADDRESS
                    ),
                ]),
                'inn' => static::INN,
                'works' => new Ubki\Data\Collection\Work([
                    new Ubki\Data\Work(
                        Carbon::parse(static::CREATED_AT),
                        Ubki\Dictionary\Language::ENG(),
                        static::EGRPOU,
                        static::WORK_NAME,
                        Ubki\Dictionary\IdentifierRank::DIRECTOR(),
                        10,
                        2500.50
                    ),
                ]),
                'photos' => new Ubki\Data\Collection\Photo([
                    new Ubki\Data\Photo(
                        Carbon::parse(static::CREATED_AT),
                        static::PHOTO_URI,
                        static::INN
                    ),
                ]),
                'linkedPersons' => new Ubki\Data\Collection\LinkedPerson([
                    new Ubki\Data\LinkedPerson(
                        static::LINKED_NAME,
                        Ubki\Dictionary\LinkedIdentifierRole::DIRECTOR(),
                        Carbon::parse(static::LINKED_ISSUE_DATE),
                        static::LINKED_EGRPOU
                    ),
                ]),
            ],
            $this->credential->jsonSerialize()
        );
    }

    public function testTag(): void
    {
        $this->assertEquals('cki', $this->credential::tag());
    }

    public function testGetLanguage(): void
    {
        $this->assertEquals(Ubki\Dictionary\Language::ENG(), $this->credential->getLanguage());
    }

    public function testGetName(): void
    {
        $this->assertEquals(static::NAME, $this->credential->getName());
    }

    public function testGetPatronymic(): void
    {
        $this->assertEquals(static::PATRONYMIC, $this->credential->getPatronymic());
    }

    public function testGetSurname(): void
    {
        $this->assertEquals(static::SURNAME, $this->credential->getSurname());
    }

    public function testGetBirthDate(): void
    {
        $this->assertEquals(Carbon::parse(static::BIRTH_DATE), $this->credential->getBirthDate());
    }

    public function testGetIdentifiers(): void
    {
        $this->assertEquals(
            new Ubki\Data\Collection\IdentifiedPerson([
                new Ubki\Data\NaturalPerson(
                    Carbon::parse(static::CREATED_AT),
                    Ubki\Dictionary\Language::ENG(),
                    static::NAME,
                    static::SURNAME,
                    Carbon::parse(static::BIRTH_DATE),
                    Ubki\Dictionary\Gender::MAN(),
                    static::INN,
                    static::PATRONYMIC,
                    Ubki\Dictionary\FamilyStatus::WIDOW(),
                    Ubki\Dictionary\Education::ACADEMIC(),
                    Ubki\Dictionary\Nationality::ARMENIA(),
                    Ubki\Dictionary\RegistrationSpd::BUSINESS(),
                    Ubki\Dictionary\SocialStatus::OTHER(),
                    1
                ),
            ]),
            $this->credential->getIdentifiers()
        );
    }

    public function testGetDocuments(): void
    {
        $this->assertEquals(
            new Ubki\Data\Collection\Document([
                new Ubki\Data\Document(
                    Carbon::parse(static::CREATED_AT),
                    Ubki\Dictionary\Language::ENG(),
                    Ubki\Dictionary\Document::PASSPORT(),
                    static::DOCUMENT_SERIAL,
                    static::DOCUMENT_NUMBER,
                    static::DOCUMENT_ISSUE,
                    Carbon::parse(static::DOCUMENT_ISSUE_DATE),
                    Carbon::parse(static::DOCUMENT_TERMIN)
                ),
            ]),
            $this->credential->getDocuments()
        );
    }

    public function testGetAddresses(): void
    {
        $this->assertEquals(
            new Ubki\Data\Collection\Address([
                new Ubki\Data\Address(
                    Carbon::parse(static::CREATED_AT),
                    Ubki\Dictionary\Language::ENG(),
                    Ubki\Dictionary\Address::HOME(),
                    static::COUNTRY,
                    static::CITY,
                    static::STREET,
                    static::HOUSE,
                    static::INDEX,
                    static::STATE,
                    static::AREA,
                    Ubki\Dictionary\City::TOWN(),
                    static::CORPUS,
                    static::FLAT,
                    static::FULL_ADDRESS
                ),
            ]),
            $this->credential->getAddresses()
        );
    }

    public function testGetInn(): void
    {
        $this->assertEquals(static::INN, $this->credential->getInn());
    }

    public function testGetWorks(): void
    {
        $this->assertEquals(
            new Ubki\Data\Collection\Work([
                new Ubki\Data\Work(
                    Carbon::parse(static::CREATED_AT),
                    Ubki\Dictionary\Language::ENG(),
                    static::EGRPOU,
                    static::WORK_NAME,
                    Ubki\Dictionary\IdentifierRank::DIRECTOR(),
                    10,
                    2500.50
                ),
            ]),
            $this->credential->getWorks()
        );
    }

    public function testGetPhotos(): void
    {
        $this->assertEquals(
            new Ubki\Data\Collection\Photo([
                new Ubki\Data\Photo(
                    Carbon::parse(static::CREATED_AT),
                    static::PHOTO_URI,
                    static::INN
                ),
            ]),
            $this->credential->getPhotos()
        );
    }

    public function testGetLinkedPersons(): void
    {
        $this->assertEquals(
            new Ubki\Data\Collection\LinkedPerson([
                new Ubki\Data\LinkedPerson(
                    static::LINKED_NAME,
                    Ubki\Dictionary\LinkedIdentifierRole::DIRECTOR(),
                    Carbon::parse(static::LINKED_ISSUE_DATE),
                    static::LINKED_EGRPOU
                ),
            ]),
            $this->credential->getLinkedPersons()
        );
    }
}
