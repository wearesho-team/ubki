<?php

namespace Wearesho\Bobra\Ubki\Tests\Data\Credential\Identifier;

use Carbon\Carbon;

use Wearesho\Bobra\Ubki;

/**
 * Class EntityTestCase
 * @package Wearesho\Bobra\Ubki\Tests\Data\Identifier
 */
abstract class EntityTestCase extends Ubki\Tests\Extend\ElementTestCase
{
    /** @var Ubki\Data\Credential\Identifier\Entity */
    protected $element;

    public function testGetters(): void
    {
        $this->assertEquals(Carbon::parse('2020-03-12'), Carbon::instance($this->element->createdAt));
        $this->assertEquals('2020-03-12', Carbon::instance($this->element->createdAt)->toDateString());
        $this->assertEquals('name', $this->element->name);
        $this->assertEquals(Ubki\Data\Language::ENG(), $this->element->language);
    }
}
