<?php

namespace Wearesho\Bobra\Ubki\Tests\Data\Credential\Identifier;

use Carbon\Carbon;

use Wearesho\Bobra\Ubki\Data;
use Wearesho\Bobra\Ubki\Tests;

/**
 * Class EntityTestCase
 * @package Wearesho\Bobra\Ubki\Tests\Data\Credential\Identifier
 */
abstract class EntityTestCase extends Tests\Extend\ElementTestCase
{
    /** @var Data\Credential\Identifier\Entity */
    protected $element;

    public function testGetters(): void
    {
        $this->assertEquals(Carbon::parse('2020-03-12'), Carbon::instance($this->element->createdAt));
        $this->assertEquals('2020-03-12', Carbon::instance($this->element->createdAt)->toDateString());
        $this->assertEquals('name', $this->element->name);
        $this->assertEquals(Data\Language::ENG(), $this->element->language);
    }
}
