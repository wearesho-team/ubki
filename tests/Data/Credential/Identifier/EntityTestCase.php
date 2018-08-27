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
    /** @var Ubki\Data\Credential\Identifier\Identifier */
    protected $element;

    public function testGetCreatedAt(): void
    {
        $expected = Carbon::parse('2020-03-12');
        $this->assertEquals($expected, Carbon::instance($this->element->createdAt));
        $this->assertEquals($expected, Carbon::instance($this->element->getCreatedAt()));
    }

    public function testGetName(): void
    {
        $expected = 'name';
        $this->assertEquals($expected, $this->element->name);
        $this->assertEquals($expected, $this->element->getName());
    }

    public function testGetLanguage(): void
    {
        $expected = Ubki\Data\Language::ENG();
        $this->assertEquals($expected, $this->element->language);
        $this->assertEquals($expected, $this->element->getLanguage());
    }
}
