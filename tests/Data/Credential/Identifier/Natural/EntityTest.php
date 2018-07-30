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
        $this->assertEquals(0, $this->element->getChildrenCount());
    }

    public function testGetRegistrationSpd(): void
    {
        $this->assertEquals(Data\RegistrationSpd::PHYSICAL(), $this->element->getRegistrationSpd());
    }

    public function testGetInn(): void
    {
        $this->assertEquals('1234567890', $this->element->getInn());
    }

    public function testGetMiddleName(): void
    {
        $this->assertEquals('Andreevich', $this->element->getMiddleName());
    }

    public function testGetBirthDate(): void
    {
        $this->assertEquals(
            Carbon::create(
                2010,
                10,
                10,
                10,
                10,
                10
            ),
            $this->element->getBirthDate()
        );
    }

    public function testGetGender(): void
    {
        $this->assertEquals(Data\Gender::MAN(), $this->element->getGender());
    }

    public function testGetSocialStatus(): void
    {
        $this->assertEquals(Data\SocialStatus::FULL_TIME(), $this->element->getSocialStatus());
    }

    public function testGetEducation(): void
    {
        $this->assertEquals(Data\Education::SECONDARY_TECH(), $this->element->getEducation());
    }

    public function testGetNationality(): void
    {
        $this->assertEquals(Data\Nationality::UKRAINE(), $this->element->getNationality());
    }

    public function testGetLastName(): void
    {
        $this->assertEquals('Varkuta', $this->element->getLastName());
    }

    public function testGetFamilyStatus(): void
    {
        $this->assertEquals(
            Data\FamilyStatus::SINGLE('не женат/не замужем'),
            $this->element->getFamilyStatus()
        );
    }
}
