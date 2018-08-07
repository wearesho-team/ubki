<?php


namespace Wearesho\Bobra\Ubki\Tests\Data\Credential\Identifier\Natural;

use Carbon\Carbon;

use Wearesho\Bobra\Ubki\Data;
use Wearesho\Bobra\Ubki\Tests;

/**
 * Class EntityTest
 * @internal
 * @package Wearesho\Bobra\Ubki\Tests\Data\Credential\Identifier\Natural
 */
class EntityTest extends Tests\Data\Credential\Identifier\EntityTestCase
{
    protected const TAG = 'ident';

    /** @var Data\Credential\Identifier\Natural\Entity */
    protected $element;

    public function setUp(): void
    {
        $this->element = new Data\Credential\Identifier\Natural\Entity(
            Carbon::create(
                2020,
                3,
                12,
                10,
                5,
                7
            ),
            Data\Language::ENG(),
            'name',
            'Varkuta',
            Carbon::create(
                2010,
                10,
                10,
                10,
                10,
                10
            ),
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
        $this->assertEquals(0, $this->element->childrenCount);
    }

    public function testGetRegistrationSpd(): void
    {
        $this->assertEquals(Data\RegistrationSpd::PHYSICAL(), $this->element->registrationSpd);
    }

    public function testGetInn(): void
    {
        $this->assertEquals('1234567890', $this->element->inn);
    }

    public function testGetMiddleName(): void
    {
        $this->assertEquals('Andreevich', $this->element->middleName);
    }

    public function testGetBirthDate(): void
    {
        $this->assertEquals(
            Carbon::create(2010, 10, 10, 10, 10, 10),
            Carbon::instance($this->element->birthDate)
        );
        $this->assertEquals(
            '2010-10-10 10:10:10',
            Carbon::instance($this->element->birthDate)->toDateTimeString()
        );
    }

    public function testGetGender(): void
    {
        $this->assertEquals(Data\Gender::MAN(), $this->element->gender);
    }

    public function testGetSocialStatus(): void
    {
        $this->assertEquals(Data\SocialStatus::FULL_TIME(), $this->element->socialStatus);
    }

    public function testGetEducation(): void
    {
        $this->assertEquals(Data\Education::SECONDARY_TECH(), $this->element->education);
    }

    public function testGetNationality(): void
    {
        $this->assertEquals(Data\Nationality::UKRAINE(), $this->element->nationality);
    }

    public function testGetLastName(): void
    {
        $this->assertEquals('Varkuta', $this->element->lastName);
    }

    public function testGetFamilyStatus(): void
    {
        $this->assertEquals(Data\FamilyStatus::SINGLE('не женат/не замужем'), $this->element->familyStatus);
    }

    public function testJsonSerialize(): void
    {
        $this->assertEquals(
            [
                'createdAt' => '2020-03-12',
                'language' => 'ENG',
                'name' => 'name',
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
                'childrenCount' => 0
            ],
            $this->element->jsonSerialize()
        );
    }
}
