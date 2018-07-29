<?php


namespace Wearesho\Bobra\Ubki\Tests\Data\Work;

use Carbon\Carbon;

use Wearesho\Bobra\Ubki;

/**
 * Class CollectionTest
 * @internal
 * @package Wearesho\Bobra\Ubki\Tests\Data\Work
 */
class CollectionTest extends Ubki\Tests\Extend\CollectionTestCase
{
    protected const TYPE = Ubki\Data\Work\Entity::class;

    /** @var Ubki\Data\Work\Collection */
    protected $collection;

    protected function setUp()
    {
        $this->collection = new Ubki\Data\Work\Collection([
            new Ubki\Data\Work\Entity(
                Carbon::create(2020, 10, 5, 5, 6, 0),
                Ubki\Data\Language::RUS('русский'),
                'ergpou',
                'name',
                Ubki\Data\Work\Rank::SPECIALIST(),
                1,
                200.00
            )
        ]);
    }

    public function testInstance(): void
    {
        $this->assertEquals(
            new Ubki\Data\Work\Collection([
                new Ubki\Data\Work\Entity(
                    Carbon::create(2020, 10, 5, 5, 6, 0),
                    Ubki\Data\Language::RUS('русский'),
                    'ergpou',
                    'name',
                    Ubki\Data\Work\Rank::SPECIALIST(),
                    1,
                    200.00
                )
            ]),
            $this->collection
        );
    }
}
