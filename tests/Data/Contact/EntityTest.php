<?php

namespace Wearesho\Bobra\Ubki\Tests\Data\Contact;

use Carbon\Carbon;

use Wearesho\Bobra\Ubki\Data;
use Wearesho\Bobra\Ubki\Tests;

/**
 * Class EntityTest
 * @package Wearesho\Bobra\Ubki\Tests\Data\Contact
 *
 * @internal
 */
class EntityTest extends Tests\Extend\ElementTestCase
{
    protected const TAG = 'cont';

    /** @var Data\Contact\Entity */
    protected $element;

    /** @var Carbon */
    protected $now;

    protected function setUp(): void
    {
        $this->now = Carbon::now();

        $this->element = new Data\Contact\Entity(
            $this->now,
            '+380930439475',
            Data\Contact\Type::MOBILE(),
            '1231231230'
        );
    }

    public function testGetType(): void
    {
        $this->assertEquals(Data\Contact\Type::MOBILE(), $this->element->type);
    }

    public function testGetCreatedAt(): void
    {
        $this->assertEquals($this->now, Carbon::instance($this->element->createdAt));
    }

    public function testGetValue(): void
    {
        $this->assertEquals('+380930439475', $this->element->value);
    }

    public function testGetInn(): void
    {
        $this->assertEquals('1231231230', $this->element->inn);
    }

    public function testJsonSerialize(): void
    {
        $this->assertEquals(
            [
                'createdAt' => $this->now->toDateString(),
                'value' => '+380930439475',
                'type' => 'MOBILE',
                'inn' => '1231231230'
            ],
            $this->element->jsonSerialize()
        );
    }
}
