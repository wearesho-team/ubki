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

    /** @var Data\Credential\Identifier\Natural\Entity */
    protected $element;

    public function setUp(): void
    {
        $this->element = new Data\Credential\Identifier\Natural\Entity(
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

    public function testGetters(): void
    {
        parent::testGetters();

        $this->assertEquals(0, $this->element->childrenCount);
        $this->assertEquals(Data\RegistrationSpd::PHYSICAL(), $this->element->registrationSpd);
        $this->assertEquals('1234567890', $this->element->inn);
        $this->assertEquals('Andreevich', $this->element->patronymic);
        $this->assertEquals(Carbon::parse('2010-10-10'), Carbon::instance($this->element->birthDate));
        $this->assertEquals('2010-10-10', Carbon::instance($this->element->birthDate)->toDateString());
        $this->assertEquals(Data\Gender::MAN(), $this->element->gender);
        $this->assertEquals(Data\SocialStatus::FULL_TIME(), $this->element->socialStatus);
        $this->assertEquals(Data\Education::SECONDARY_TECH(), $this->element->education);
        $this->assertEquals(Data\Nationality::UKRAINE(), $this->element->nationality);
        $this->assertEquals('Varkuta', $this->element->surname);
        $this->assertEquals(Data\FamilyStatus::SINGLE('не женат/не замужем'), $this->element->familyStatus);
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
