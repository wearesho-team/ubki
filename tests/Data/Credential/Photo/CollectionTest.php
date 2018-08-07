<?php


namespace Wearesho\Bobra\Ubki\Tests\Data\Credential\Photo;

use Carbon\Carbon;

use Wearesho\Bobra\Ubki\Data;
use Wearesho\Bobra\Ubki\Tests;

/**
 * Class CollectionTest
 * @internal
 * @package Wearesho\Bobra\Ubki\Tests\Data\Credential\Photo
 */
class CollectionTest extends Tests\Extend\CollectionTestCase
{
    protected const TYPE = Data\Credential\Photo\Entity::class;

    /** @var Data\Credential\Photo\Collection */
    protected $collection;

    protected function setUp(): void
    {
        $this->collection = new Data\Credential\Photo\Collection([
            new Data\Credential\Photo\Entity(
                Carbon::create(2017, 3, 12, 5, 34, 26),
                'first photo'
            ),
            new Data\Credential\Photo\Entity(
                Carbon::create(2018, 4, 5, 2, 17, 55),
                'second photo',
                '1234567890'
            )
        ]);
    }

    public function testInstance(): void
    {
        $this->assertEquals(
            new Data\Credential\Photo\Collection([
                new Data\Credential\Photo\Entity(
                    Carbon::create(2017, 3, 12, 5, 34, 26),
                    'first photo'
                ),
                new Data\Credential\Photo\Entity(
                    Carbon::create(2018, 4, 5, 2, 17, 55),
                    'second photo',
                    '1234567890'
                )
            ]),
            $this->collection
        );
    }
}
