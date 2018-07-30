<?php

namespace Wearesho\Bobra\Ubki\Tests\Data\Contact;

use Carbon\Carbon;

use Wearesho\Bobra\Ubki\Data;
use Wearesho\Bobra\Ubki\Element;
use Wearesho\Bobra\Ubki\Tests;

/**
 * Class ContactTest
 * @internal
 * @package Wearesho\Bobra\Ubki\Tests\Collection
 */
class CollectionTest extends Tests\Extend\CollectionTestCase
{
    protected const TYPE = Data\Contact\Entity::class;

    /** @var Data\Contact\Collection collection */
    protected $collection;

    /** @var array[] */
    protected $fakePhoneNumbers;

    /** @var Carbon[] */
    protected $fakeDates;

    /** @var string[] */
    protected $fakeInns;

    protected function setUp(): void
    {
        for ($i = 0; $i < rand(1, 20); $i++) {
            $this->fakePhoneNumbers[] = [
                // todo: implement Type\Contact::...
                rand(1, 5),
                '+' . rand(100000, 999999) . rand(100000, 999999)
            ];

            $this->fakeDates[] = Carbon::create(
                rand(1985, 2020),
                rand(1, 12),
                rand(1, 30),
                rand(1, 24),
                rand(1, 60),
                rand(1, 60)
            );

            $this->fakeInns[] = rand(0, 1) ? rand(10000, 99999) . rand(10000, 99999) : null;
        }

        $this->collection = new Data\Contact\Collection();

        foreach ($this->fakePhoneNumbers as $index => $number) {
            $this->collection->append(new Data\Contact\Entity(
                $this->fakeDates[$index],
                $number[1],
                $number[0],
                $this->fakeInns[$index]
            ));
        }
    }

    public function testCount(): void
    {
        $this->assertEquals(count($this->fakePhoneNumbers), $this->collection->count());
    }

    public function testOffsetGet(): void
    {
        foreach ($this->fakePhoneNumbers as $index => $number) {
            /** @var Data\Contact\Entity $element */
            $element = $this->collection->offsetGet($index);
            $this->assertEquals($number[1], $element->getValue());
            $this->assertEquals($this->fakeDates[$index], $element->getCreatedAt());
            $this->assertEquals($this->fakeInns[$index], $element->getInn());
        }
    }

    public function testAppendInvalid(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->collection->append(new class extends Element
        {
            public const TAG = 'test';
        });
    }
}
