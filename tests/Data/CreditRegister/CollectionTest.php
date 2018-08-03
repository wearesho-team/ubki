<?php

namespace Wearesho\Bobra\Ubki\Tests\Data\CreditRegister;

use Carbon\Carbon;

use Wearesho\Bobra\Ubki\Data;
use Wearesho\Bobra\Ubki\Tests;

/**
 * Class CollectionTest
 * @internal
 * @package Wearesho\Bobra\Ubki\Tests\Data\CreditRegister
 */
class CollectionTest extends Tests\Extend\CollectionTestCase
{
    protected const TYPE = Data\CreditRegister\Entity::class;

    /** @var Data\CreditRegister\Collection */
    protected $collection;

    public function testInstance(): void
    {
        $this->assertEquals(
            new Data\CreditRegister\Collection([
                new Data\CreditRegister\Entity(
                    Carbon::parse('2018-03-12'),
                    '1234567890',
                    'identificator',
                    Data\CreditRegister\Decision::POSITIVE(),
                    1,
                    'BNK'
                ),
                new Data\CreditRegister\Entity(
                    Carbon::parse('2017-02-11'),
                    '3216549870',
                    'qwe-rty-uio-p',
                    Data\CreditRegister\Decision::NEGATIVE(),
                    2,
                    'MFO'
                )
            ]),
            $this->collection
        );
    }

    protected function setUp(): void
    {
        $this->collection = new Data\CreditRegister\Collection([
            new Data\CreditRegister\Entity(
                Carbon::parse('2018-03-12'),
                '1234567890',
                'identificator',
                Data\CreditRegister\Decision::POSITIVE(),
                1,
                'BNK'
            ),
            new Data\CreditRegister\Entity(
                Carbon::parse('2017-02-11'),
                '3216549870',
                'qwe-rty-uio-p',
                Data\CreditRegister\Decision::NEGATIVE(),
                2,
                'MFO'
            )
        ]);
    }
}
