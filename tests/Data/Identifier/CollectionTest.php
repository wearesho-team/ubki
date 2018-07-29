<?php


namespace Wearesho\Bobra\Ubki\Tests\Data\Identifier;

use Carbon\Carbon;

use Wearesho\Bobra\Ubki;

/**
 * Class CollectionTest
 * @internal
 * @package Wearesho\Bobra\Ubki\Tests\Data\Identifier
 */
class CollectionTest extends Ubki\Tests\Extend\CollectionTestCase
{
    protected const TYPE = Ubki\Data\Identifier\Entity::class;

    /** @var Ubki\Data\Identifier\Collection */
    protected $collection;

    protected function setUp(): void
    {
        $this->collection = new Ubki\Data\Identifier\Collection();
    }

    public function testAppend(): void
    {
        $this->collection->append(
            new Ubki\Data\Identifier\Natural\Entity(
                Carbon::create(2020, 10, 10, 10, 10),
                Ubki\Data\Language::ENG(),
                'Roman',
                'Varkuta',
                Carbon::create(2020, 10, 10, 10, 10),
                Ubki\Data\Gender::MAN(),
                '1234567890',
                'Andreevich',
                Ubki\Data\FamilyStatus::SINGLE('не женат/не замужем'),
                Ubki\Data\Education::SECONDARY_TECH(),
                Ubki\Data\Nationality::UKRAINE(),
                Ubki\Data\RegistrationSpd::PHYSICAL(),
                Ubki\Data\SocialStatus::FULL_TIME(),
                0
            )
        );

        $this->collection->append(
            new Ubki\Data\Identifier\Legal\Entity(
                Carbon::create(2020, 10, 10, 10, 10),
                Ubki\Data\Language::ENG(),
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
            new Ubki\Data\Identifier\Natural\Entity(
                Carbon::create(2020, 10, 10, 10, 10),
                Ubki\Data\Language::ENG(),
                'Roman',
                'Varkuta',
                Carbon::create(2020, 10, 10, 10, 10),
                Ubki\Data\Gender::MAN(),
                '1234567890',
                'Andreevich',
                Ubki\Data\FamilyStatus::SINGLE('не женат/не замужем'),
                Ubki\Data\Education::SECONDARY_TECH(),
                Ubki\Data\Nationality::UKRAINE(),
                Ubki\Data\RegistrationSpd::PHYSICAL(),
                Ubki\Data\SocialStatus::FULL_TIME(),
                0
            ),
            $this->collection->offsetGet(0)
        );
        $this->assertEquals(
            new Ubki\Data\Identifier\Legal\Entity(
                Carbon::create(2020, 10, 10, 10, 10),
                Ubki\Data\Language::ENG(),
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
