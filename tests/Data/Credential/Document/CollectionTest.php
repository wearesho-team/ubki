<?php

<<<<<<< HEAD

=======
>>>>>>> feature/element-document
namespace Wearesho\Bobra\Ubki\Tests\Data\Credential\Document;

use Carbon\Carbon;

use Wearesho\Bobra\Ubki\Data;
use Wearesho\Bobra\Ubki\Tests;

/**
 * Class CollectionTest
 * @internal
<<<<<<< HEAD
 * @package Wearesho\Bobra\Ubki\Tests\Data\Credential\Document
=======
 * @package Wearesho\Bobra\Ubki\Tests\Data\Document
>>>>>>> feature/element-document
 */
class CollectionTest extends Tests\Extend\CollectionTestCase
{
    protected const TYPE = Data\Credential\Document\Entity::class;

    /** @var Data\Credential\Document\Collection */
    protected $collection;

    protected function setUp(): void
    {
        $this->collection = new Data\Credential\Document\Collection([
            new Data\Credential\Document\Entity(
                Carbon::create(2020, 3, 12, 10, 5, 7),
                Data\Language::ENG('английский'),
                Data\Credential\Document\Type::PASSPORT(),
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
            new Data\Credential\Document\Collection([
                new Data\Credential\Document\Entity(
                    Carbon::create(2020, 3, 12, 10, 5, 7),
                    Data\Language::ENG('английский'),
                    Data\Credential\Document\Type::PASSPORT(),
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
