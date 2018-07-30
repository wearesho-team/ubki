<?php


namespace Wearesho\Bobra\Ubki\Tests\Data\Identifier;

use Carbon\Carbon;

use Wearesho\Bobra\Ubki\Data;
use Wearesho\Bobra\Ubki\Tests;

/**
 * Class CollectionTest
 * @internal
 * @package Wearesho\Bobra\Ubki\Tests\Data\Identifier
 */
class CollectionTest extends Tests\Extend\CollectionTestCase
{
    protected const TYPE = Data\Credential\Identifier\Entity::class;

    /** @var Data\Credential\Identifier\Collection */
    protected $collection;

    protected function setUp(): void
    {
        $this->collection = new Data\Credential\Identifier\Collection();
    }

    public function testAppend(): void
    {
        $this->collection->append(
            new Data\Credential\Identifier\Natural\Entity(
                Carbon::create(2020, 10, 10, 10, 10),
                Data\Language::ENG(),
                'Roman',
                'Varkuta',
                Carbon::create(2020, 10, 10, 10, 10),
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
        );

        $this->collection->append(
            new Data\Credential\Identifier\Legal\Entity(
                Carbon::create(2020, 10, 10, 10, 10),
                Data\Language::ENG(),
                'name',
                'ergpou',
                1,
                '123',
                'type',
                Carbon::create(2020, 10, 10, 10, 10),
                Carbon::create(2020, 10, 10, 10, 10)
            )
        );

        $this->assertEquals(
            new Data\Credential\Identifier\Natural\Entity(
                Carbon::create(2020, 10, 10, 10, 10),
                Data\Language::ENG(),
                'Roman',
                'Varkuta',
                Carbon::create(2020, 10, 10, 10, 10),
                Data\Gender::MAN(),
                '1234567890',
                'Andreevich',
                Data\FamilyStatus::SINGLE('не женат/не замужем'),
                Data\Education::SECONDARY_TECH(),
                Data\Nationality::UKRAINE(),
                Data\RegistrationSpd::PHYSICAL(),
                Data\SocialStatus::FULL_TIME(),
                0
            ),
            $this->collection->offsetGet(0)
        );
        $this->assertEquals(
            new Data\Credential\Identifier\Legal\Entity(
                Carbon::create(2020, 10, 10, 10, 10),
                Data\Language::ENG(),
                'name',
                'ergpou',
                1,
                '123',
                'type',
                Carbon::create(2020, 10, 10, 10, 10),
                Carbon::create(2020, 10, 10, 10, 10)
            ),
            $this->collection->offsetGet(1)
        );
    }
}
