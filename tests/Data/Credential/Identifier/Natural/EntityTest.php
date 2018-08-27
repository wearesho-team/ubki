<?php


namespace Wearesho\Bobra\Ubki\Tests\Data\Credential\Identifier\Natural;

use Carbon\Carbon;

use Wearesho\Bobra\Ubki\Data;
use Wearesho\Bobra\Ubki\Tests;

/**
 * Class EntityTest
 * @internal
 * @package Wearesho\Bobra\Ubki\Tests\Data\Identifier\Natural
 */
class EntityTest extends Tests\Data\Credential\Identifier\EntityTestCase
{
    protected const TAG = 'ident';

    /** @var Data\Credential\Identifier\Natural\NaturalIdentifier */
    protected $element;

    public function setUp(): void
    {
        $this->element = new Data\Credential\Identifier\Natural\NaturalIdentifier(
            Carbon::parse('2020-03-12'),
            Data\Language::ENG(),
            'name',
            'Varkuta',
            Carbon::parse('2010-10-10'),
            Data\Gender::MAN(),
            '1234567890',
            'Andreevich',
            Data\FamilyStatus::SINGLE('не женат/не замужем'),
            Data\Education::SECONDARY_TECH(),
            Data\Nationality::UKRAINE(),
            Data\RegistrationSpd::PHYSICAL(),
            Data\SocialStatus::FULL_TIME(),
            0
        );
    }

    public function testGetChildrenCount(): void
    {
        $expected = 0;
        $this->assertEquals($expected, $this->element->childrenCount);
        $this->assertEquals($expected, $this->element->getChildrenCount());
    }

    public function testGetRegistrationSpd(): void
    {
        $expected = Data\RegistrationSpd::PHYSICAL();
        $this->assertEquals($expected, $this->element->registrationSpd);
        $this->assertEquals($expected, $this->element->getRegistrationSpd());
    }

    public function testGetInn(): void
    {
        $expected = '1234567890';
        $this->assertEquals($expected, $this->element->inn);
        $this->assertEquals($expected, $this->element->getInn());
    }

    public function testGetPatronymic(): void
    {
        $expected = 'Andreevich';
        $this->assertEquals($expected, $this->element->patronymic);
        $this->assertEquals($expected, $this->element->getPatronymic());
    }

    public function testGetBirthDate(): void
    {
        $expected = Carbon::parse('2010-10-10');
        $this->assertEquals($expected, Carbon::instance($this->element->birthDate));
        $this->assertEquals($expected, Carbon::instance($this->element->getBirthDate()));
    }

    public function testGetGender(): void
    {
        $expected = Data\Gender::MAN();
        $this->assertEquals($expected, $this->element->gender);
        $this->assertEquals($expected, $this->element->getGender());
    }

    public function testGetSocialStatus(): void
    {
        $expected = Data\SocialStatus::FULL_TIME();
        $this->assertEquals($expected, $this->element->socialStatus);
        $this->assertEquals($expected, $this->element->getSocialStatus());
    }

    public function testGetEducation(): void
    {
        $expected = Data\Education::SECONDARY_TECH();
        $this->assertEquals($expected, $this->element->education);
        $this->assertEquals($expected, $this->element->getEducation());
    }

    public function testGetNationality(): void
    {
        $expected = Data\Nationality::UKRAINE();
        $this->assertEquals($expected, $this->element->nationality);
        $this->assertEquals($expected, $this->element->getNationality());
    }

    public function testGetSurname(): void
    {
        $expected = 'Varkuta';
        $this->assertEquals($expected, $this->element->surname);
        $this->assertEquals($expected, $this->element->getSurname());
    }
    
    public function testGetFamilyStatus(): void
    {
        $expected = Data\FamilyStatus::SINGLE('не женат/не замужем');
        $this->assertEquals($expected, $this->element->familyStatus);
        $this->assertEquals($expected, $this->element->getFamilyStatus());
    }

    public function testJsonSerialize(): void
    {
        $this->assertEquals(
            [
                'createdAt' => '2020-03-12',
                'language' => 'ENG',
                'name' => 'name',
                'surname' => 'Varkuta',
                'birthDate' => '2010-10-10',
                'gender' => 'MAN',
                'inn' => '1234567890',
                'patronymic' => 'Andreevich',
                'familyStatus' => 'не женат/не замужем',
                'education' => 'SECONDARY_TECH',
                'nationality' => 'UKRAINE',
                'registrationSpd' => 'PHYSICAL',
                'socialStatus' => 'FULL_TIME',
                'childrenCount' => 0
            ],
            $this->element->jsonSerialize()
        );
    }
}
