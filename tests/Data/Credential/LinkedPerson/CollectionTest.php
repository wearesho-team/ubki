<?php

namespace Wearesho\Bobra\Ubki\Tests\Data\Credential\LinkedPerson;

use Carbon\Carbon;

use Wearesho\Bobra\Ubki\Data;
use Wearesho\Bobra\Ubki\Tests;

/**
 * Class CollectionTest
 * @internal
 * @package Wearesho\Bobra\Ubki\Tests\Data\Credential\LinkedPerson
 */
class CollectionTest extends Tests\Extend\CollectionTestCase
{
    protected const TYPE = Data\Credential\LinkedPerson\Entity::class;

    /** @var Data\Credential\LinkedPerson\Collection */
    protected $collection;

    protected function setUp(): void
    {
        $this->collection = new Data\Credential\LinkedPerson\Collection([
            new Data\Credential\LinkedPerson\Entity(
                'name',
                1,
                Carbon::create(2018, 9, 30, 12, 24, 25),
                '123123123'
            ),
            new Data\Credential\LinkedPerson\Entity(
                'second name',
                2,
                Carbon::create(2019, 7, 25, 3, 4, 22),
                '321654987'
            )
        ]);
    }

    public function testInstance(): void
    {
        $this->assertEquals(
            new Data\Credential\LinkedPerson\Collection([
                new Data\Credential\LinkedPerson\Entity(
                    'name',
                    1,
                    Carbon::create(2018, 9, 30, 12, 24, 25),
                    '123123123'
                ),
                new Data\Credential\LinkedPerson\Entity(
                    'second name',
                    2,
                    Carbon::create(2019, 7, 25, 3, 4, 22),
                    '321654987'
                )
            ]),
            $this->collection
        );
    }
}
