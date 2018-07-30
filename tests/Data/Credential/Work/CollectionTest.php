<?php


namespace Wearesho\Bobra\Ubki\Tests\Data\Credential\Work;

use Carbon\Carbon;

use Wearesho\Bobra\Ubki\Data;
use Wearesho\Bobra\Ubki\Tests;

/**
 * Class CollectionTest
 * @internal
 * @package Wearesho\Bobra\Ubki\Tests\Data\Work
 */
class CollectionTest extends Tests\Extend\CollectionTestCase
{
    protected const TYPE = Data\Credential\Work\Entity::class;

    /** @var Data\Credential\Work\Collection */
    protected $collection;

    protected function setUp()
    {
        $this->collection = new Data\Credential\Work\Collection([
            new Data\Credential\Work\Entity(
                Carbon::create(2020, 10, 5, 5, 6, 0),
                Data\Language::RUS('русский'),
                'ergpou',
                'name',
                Data\Credential\Work\Rank::SPECIALIST(),
                1,
                200.00
            )
        ]);
    }

    public function testInstance(): void
    {
        $this->assertEquals(
            new Data\Credential\Work\Collection([
                new Data\Credential\Work\Entity(
                    Carbon::create(2020, 10, 5, 5, 6, 0),
                    Data\Language::RUS('русский'),
                    'ergpou',
                    'name',
                    Data\Credential\Work\Rank::SPECIALIST(),
                    1,
                    200.00
                )
            ]),
            $this->collection
        );
    }
}
