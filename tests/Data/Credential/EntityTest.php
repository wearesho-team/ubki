<?php


namespace Wearesho\Bobra\Ubki\Tests\Data\Credential;

use Carbon\Carbon;

use Wearesho\Bobra\Ubki\Data;
use Wearesho\Bobra\Ubki\Tests;

/**
 * Class EntityTest
 * @internal
 * @package Wearesho\Bobra\Ubki\Tests\Data\Credential
 */
class EntityTest extends Tests\Extend\ElementTestCase
{
    protected const TAG = 'cki';

    /** @var Data\Credential\Entity */
    protected $element;

    public function testGetIdentifiers(): void
    {
        $this->assertEquals(
            new Data\Credential\Identifier\Collection([
                new Data\Credential\Identifier\Natural\Entity(
                    Carbon::create(2010, 10, 10, 10),
                    Data\Language::ENG(),
                    'Roman',
                    'Varkuta',
                    Carbon::create(2010, 10, 10, 10),
                    Data\Gender::MAN(),
                    '1234567890',
                    'Andreevich',
                    Data\FamilyStatus::SINGLE('не женат/не замужем'),
                    Data\Education::SECONDARY_TECH(),
                    Data\Nationality::UKRAINE(),
                    Data\RegistrationSpd::PHYSICAL(),
                    Data\SocialStatus::FULL_TIME(),
                    0
                )
            ]),
            $this->element->getIdentifiers()
        );
    }

    public function testGetLastName(): void
    {
        $this->assertEquals(
            'Varkuta',
            $this->element->getLastName()
        );
    }

    public function testGetBirthDate()
    {
        $this->assertEquals(
            Carbon::create(2010, 10, 10, 10),
            $this->element->getBirthDate()
        );
    }

    public function testGetLanguage(): void
    {
        $this->assertEquals(
            Data\Language::ENG(),
            $this->element->getLanguage()
        );
    }

    public function testGetInn(): void
    {
        $this->assertEquals(
            '1234567890',
            $this->element->getInn()
        );
    }

    public function testGetFirstName(): void
    {
        $this->assertEquals(
            'Roman',
            $this->element->getFirstName()
        );
    }

    public function testGetMiddleName(): void
    {
        $this->assertEquals(
            'Andreevich',
            $this->element->getMiddleName()
        );
    }

    public function testGetLinkedPersons(): void
    {
        $this->assertEquals(
            new Data\Credential\LinkedPerson\Collection([
                new Data\Credential\LinkedPerson\Entity(
                    'name',
                    Data\Credential\LinkedPerson\Role::FOUNDER('Учредитель'),
                    Carbon::create(2018, 9, 30, 12, 24, 25),
                    '123123123'
                ),
                new Data\Credential\LinkedPerson\Entity(
                    'second name',
                    Data\Credential\LinkedPerson\Role::FOUNDER('Учредитель'),
                    Carbon::create(2019, 7, 25, 3, 4, 22),
                    '321654987'
                )
            ]),
            $this->element->getLinkedPersons()
        );
    }

    public function testGetWorks(): void
    {
        $this->assertEquals(
            new Data\Credential\Work\Collection([
                new Data\Credential\Work\Entity(
                    Carbon::create(2010, 10, 10, 10),
                    Data\Language::ENG(),
                    'some ergpou',
                    'SHO',
                    Data\Credential\Work\Rank::SPECIALIST(),
                    1,
                    10000.00
                )
            ]),
            $this->element->getWorks()
        );
    }

    public function testGetAddresses(): void
    {
        $this->assertEquals(
            new Data\Credential\Address\Collection([
                new Data\Credential\Address\Entity(
                    Carbon::create(2010, 10, 10, 10),
                    Data\Language::ENG(),
                    Data\Credential\Address\Type::HOME('домашний'),
                    'Ukraine',
                    'Kharkov',
                    'Lyapunova',
                    '12',
                    '61100',
                    'Shevchenkivska',
                    'Kharkivska',
                    Data\CityType::TOWN(),
                    null,
                    '24'
                )
            ]),
            $this->element->getAddresses()
        );
    }

    public function testGetPhotos(): void
    {
        $this->assertEquals(
            new Data\Credential\Photo\Collection([
                new Data\Credential\Photo\Entity(
                    Carbon::create(2017, 3, 12, 5, 34, 26),
                    base64_encode('first photo')
                ),
                new Data\Credential\Photo\Entity(
                    Carbon::create(2018, 4, 5, 2, 17, 55),
                    base64_encode('second photo'),
                    '1234567890'
                )
            ]),
            $this->element->getPhotos()
        );
    }

    public function testGetDocuments(): void
    {
        $this->assertEquals(
            new Data\Credential\Document\Collection([
                new Data\Credential\Document\Entity(
                    Carbon::create(2010, 10, 10, 10),
                    Data\Language::ENG(),
                    Data\Credential\Document\Type::PASSPORT('пасспорт'),
                    'УМ',
                    '123123',
                    'Issue by someone',
                    Carbon::create(2014, 3, 12)
                )
            ]),
            $this->element->getDocuments()
        );
    }

    public function testJsonSerialize(): void
    {
        $this->assertEquals(
            [
                'language' => 'ENG',
                'firstName' => 'Roman',
                'middleName' => 'Andreevich',
                'lastName' => 'Varkuta',
                'birthDate' => '2010-10-10',
                'identifiers' => [
                    [
                        'createdAt' => '2010-10-10',
                        'language' => 'ENG',
                        'name' => 'Roman',
                        'lastName' => 'Varkuta',
                        'birthDate' => '2010-10-10',
                        'gender' => 'MAN',
                        'inn' => '1234567890',
                        'middleName' => 'Andreevich',
                        'familyStatus' => 'не женат/не замужем',
                        'education' => 'SECONDARY_TECH',
                        'nationality' => 'UKRAINE',
                        'registrationSpd' => 'PHYSICAL',
                        'socialStatus' => 'FULL_TIME',
                        'childrenCount' => 0,
                    ],
                ],
                'documents' => [
                    [
                        'createdAt' => '2010-10-10',
                        'language' => 'ENG',
                        'type' => 'пасспорт',
                        'serial' => 'УМ',
                        'number' => '123123',
                        'issue' => 'Issue by someone',
                        'issueDate' => '2014-03-12',
                        'termin' => null,
                    ],
                ],
                'addresses' => [
                    [
                        'createdAt' => '2010-10-10',
                        'language' => 'ENG',
                        'type' => 'домашний',
                        'country' => 'Ukraine',
                        'city' => 'Kharkov',
                        'street' => 'Lyapunova',
                        'house' => '12',
                        'index' => '61100',
                        'state' => 'Shevchenkivska',
                        'area' => 'Kharkivska',
                        'cityType' => 'TOWN',
                        'corpus' => null,
                        'flat' => '24',
                        'fullAddress' => null,
                    ],
                ],
                'inn' => '1234567890',
                'works' => [
                    [
                        'createdAt' => '2010-10-10',
                        'language' => 'ENG',
                        'ergpou' => 'some ergpou',
                        'name' => 'SHO',
                        'rank' => 'SPECIALIST',
                        'experience' => 1,
                        'income' => 10000.00,
                    ],
                ],
                'photos' => [
                    [
                        'createdAt' => '2017-03-12',
                        'inn' => null,
                        'photo' => 'first photo',
                    ],
                    [
                        'createdAt' => '2018-04-05',
                        'inn' => '1234567890',
                        'photo' => 'second photo',
                    ],
                ],
                'linkedPersons' => [
                    [
                        'name' => 'name',
                        'role' => 'Учредитель',
                        'issueDate' => '2018-09-30',
                        'ergpou' => '123123123'
                    ],
                    [
                        'name' => 'second name',
                        'role' => 'Учредитель',
                        'issueDate' => '2019-07-25',
                        'ergpou' => '321654987'
                    ],
                ],
            ],
            $this->element->jsonSerialize()
        );
    }

    protected function setUp(): void
    {
        $this->element = new Data\Credential\Entity(
            Data\Language::ENG(),
            'Roman',
            'Andreevich',
            'Varkuta',
            Carbon::create(2010, 10, 10, 10),
            new Data\Credential\Identifier\Collection([
                new Data\Credential\Identifier\Natural\Entity(
                    Carbon::create(2010, 10, 10, 10),
                    Data\Language::ENG(),
                    'Roman',
                    'Varkuta',
                    Carbon::create(2010, 10, 10, 10),
                    Data\Gender::MAN(),
                    '1234567890',
                    'Andreevich',
                    Data\FamilyStatus::SINGLE('не женат/не замужем'),
                    Data\Education::SECONDARY_TECH(),
                    Data\Nationality::UKRAINE(),
                    Data\RegistrationSpd::PHYSICAL(),
                    Data\SocialStatus::FULL_TIME(),
                    0
                )
            ]),
            new Data\Credential\Document\Collection([
                new Data\Credential\Document\Entity(
                    Carbon::create(2010, 10, 10, 10),
                    Data\Language::ENG(),
                    Data\Credential\Document\Type::PASSPORT('пасспорт'),
                    'УМ',
                    '123123',
                    'Issue by someone',
                    Carbon::create(2014, 3, 12)
                )
            ]),
            new Data\Credential\Address\Collection([
                new Data\Credential\Address\Entity(
                    Carbon::create(2010, 10, 10, 10),
                    Data\Language::ENG(),
                    Data\Credential\Address\Type::HOME('домашний'),
                    'Ukraine',
                    'Kharkov',
                    'Lyapunova',
                    '12',
                    '61100',
                    'Shevchenkivska',
                    'Kharkivska',
                    Data\CityType::TOWN(),
                    null,
                    '24'
                )
            ]),
            '1234567890',
            new Data\Credential\Work\Collection([
                new Data\Credential\Work\Entity(
                    Carbon::create(2010, 10, 10, 10),
                    Data\Language::ENG(),
                    'some ergpou',
                    'SHO',
                    Data\Credential\Work\Rank::SPECIALIST(),
                    1,
                    10000.00
                )
            ]),
            new Data\Credential\Photo\Collection([
                new Data\Credential\Photo\Entity(
                    Carbon::create(2017, 3, 12, 5, 34, 26),
                    base64_encode('first photo')
                ),
                new Data\Credential\Photo\Entity(
                    Carbon::create(2018, 4, 5, 2, 17, 55),
                    base64_encode('second photo'),
                    '1234567890'
                )
            ]),
            new Data\Credential\LinkedPerson\Collection([
                new Data\Credential\LinkedPerson\Entity(
                    'name',
                    Data\Credential\LinkedPerson\Role::FOUNDER('Учредитель'),
                    Carbon::create(2018, 9, 30, 12, 24, 25),
                    '123123123'
                ),
                new Data\Credential\LinkedPerson\Entity(
                    'second name',
                    Data\Credential\LinkedPerson\Role::FOUNDER('Учредитель'),
                    Carbon::create(2019, 7, 25, 3, 4, 22),
                    '321654987'
                )
            ])
        );
    }
}
