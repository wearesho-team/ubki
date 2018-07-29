<?php

namespace Wearesho\Bobra\Ubki\Tests\Data\Contact;

use Carbon\Carbon;

use Wearesho\Bobra\Ubki;

/**
 * Class CollectionTest
 * @internal
 * @package Wearesho\Bobra\Ubki\Tests\Data\Contact
 */
class CollectionTest extends Ubki\Tests\Extend\CollectionTestCase
{
    protected const TYPE = Ubki\Data\Contact\Entity::class;

    /** @var Ubki\Data\Contact\Collection collection */
    protected $collection;

    /** @var array[] */
    protected $fakePhoneNumbers;

    /** @var Carbon[] */
    protected $fakeDates;

    /** @var string[] */
    protected $fakeInns;

    /** @var array */
    protected $types = [
        Ubki\Data\Contact\Type::HOME,
        Ubki\Data\Contact\Type::WORK,
        Ubki\Data\Contact\Type::MOBILE,
        Ubki\Data\Contact\Type::EMAIL,
        Ubki\Data\Contact\Type::FAX,
    ];

    protected function setUp(): void
    {
        for ($i = 0; $i < rand(1, 20); $i++) {
            $this->fakePhoneNumbers[] = [
                // todo: implement Type\Contact::...
                $this->types[rand(0, 4)],
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

        $this->collection = new Ubki\Data\Contact\Collection();

        foreach ($this->fakePhoneNumbers as $index => $number) {
            $this->collection->append(new Ubki\Data\Contact\Entity(
                $this->fakeDates[$index],
                $number[1],
                new Ubki\Data\Contact\Type($number[0]),
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
        /**
         * @var int $index
         * @var Ubki\Data\Contact\Entity $contact
         */
        foreach ($this->collection as $index => $contact) {
            $this->assertEquals($this->fakePhoneNumbers[$index][1], $contact->getValue());
            $this->assertEquals($this->fakeDates[$index], $contact->getCreatedAt());
            $this->assertEquals($this->fakeInns[$index], $contact->getInn());
        }
    }

    public function testAppendInvalid(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->collection->append(new class extends Ubki\Element
        {
            public function tag(): string
            {
                return 'test';
            }
        });
    }
}
