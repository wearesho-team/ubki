<?php


namespace Wearesho\Bobra\Ubki\Tests\Data\Document;

use Carbon\Carbon;

use Wearesho\Bobra\Ubki;

/**
 * Class CollectionTest
 * @internal
 * @package Wearesho\Bobra\Ubki\Tests\Data\Document
 */
class CollectionTest extends Ubki\Tests\Extend\CollectionTestCase
{
    protected const TYPE = Ubki\Data\Document\Entity::class;

    /** @var Ubki\Data\Document\Collection */
    protected $collection;

    protected function setUp(): void
    {
        $this->collection = new Ubki\Data\Document\Collection([
            new Ubki\Data\Document\Entity(
                Carbon::create(2020, 3, 12, 10, 5, 7),
                Ubki\Data\Language::ENG('английский'),
                Ubki\Data\Document\Type::PASSPORT(),
                'AS',
                '321654',
                'Someone',
                Carbon::create(2016, 3, 12)
            )
        ]);
    }

    public function testInstance(): void
    {
        $this->assertEquals(
            new Ubki\Data\Document\Collection([
                new Ubki\Data\Document\Entity(
                    Carbon::create(2020, 3, 12, 10, 5, 7),
                    Ubki\Data\Language::ENG('английский'),
                    Ubki\Data\Document\Type::PASSPORT(),
                    'AS',
                    '321654',
                    'Someone',
                    Carbon::create(2016, 3, 12)
                )
            ]),
            $this->collection
        );
    }
}
