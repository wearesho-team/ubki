<?php

namespace Wearesho\Bobra\Ubki\Tests\Data\Credential\LinkedPerson;

use Carbon\Carbon;

use Wearesho\Bobra\Ubki\Data\Credential;
use Wearesho\Bobra\Ubki\Tests;

/**
 * Class CollectionTest
 * @internal
 * @package Wearesho\Bobra\Ubki\Tests\Data\Credential\LinkedPerson
 */
class CollectionTest extends Tests\Extend\CollectionTestCase
{
    protected const TYPE = Credential\LinkedPerson\Entity::class;

    /** @var Credential\LinkedPerson\Collection */
    protected $collection;

    protected function setUp(): void
    {
        $this->collection = new Credential\LinkedPerson\Collection([
            new Credential\LinkedPerson\Entity(
                'name',
                Credential\LinkedPerson\Role::FOUNDER('Учредитель'),
                Carbon::create(2018, 9, 30, 12, 24, 25),
                '123123123'
            ),
            new Credential\LinkedPerson\Entity(
                'second name',
                Credential\LinkedPerson\Role::FOUNDER('Учредитель'),
                Carbon::create(2019, 7, 25, 3, 4, 22),
                '321654987'
            )
        ]);
    }

    public function testInstance(): void
    {
        $this->assertEquals(
            new Credential\LinkedPerson\Collection([
                new Credential\LinkedPerson\Entity(
                    'name',
                    Credential\LinkedPerson\Role::FOUNDER('Учредитель'),
                    Carbon::create(2018, 9, 30, 12, 24, 25),
                    '123123123'
                ),
                new Credential\LinkedPerson\Entity(
                    'second name',
                    Credential\LinkedPerson\Role::FOUNDER('Учредитель'),
                    Carbon::create(2019, 7, 25, 3, 4, 22),
                    '321654987'
                )
            ]),
            $this->collection
        );
    }
}
