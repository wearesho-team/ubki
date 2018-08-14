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
        $expected = Data\Contact\Type::MOBILE();
        $this->assertEquals($expected, $this->element->type);
        $this->assertEquals($expected, $this->element->getType());
    }

    public function testGetCreatedAt(): void
    {
        $expected = $this->now;
        $this->assertEquals($expected, Carbon::instance($this->element->createdAt));
        $this->assertEquals($expected, Carbon::instance($this->element->getCreatedAt()));
    }

    public function testGetValue(): void
    {
        $expected = '+380930439475';
        $this->assertEquals($expected, $this->element->value);
        $this->assertEquals($expected, $this->element->getValue());
    }

    public function testGetInn(): void
    {
        $expected = '1231231230';
        $this->assertEquals($expected, $this->element->inn);
        $this->assertEquals($expected, $this->element->getInn());
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
