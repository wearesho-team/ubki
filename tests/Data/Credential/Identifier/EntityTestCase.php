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

    public function testGetCreatedAt(): void
    {
        $this->assertEquals(
            Carbon::create(2020, 3, 12, 10, 5, 7),
            $this->element->createdAt
        );
    }

    public function testGetName(): void
    {
        $this->assertEquals('name', $this->element->name);
    }

    public function testGetLanguage(): void
    {
        $this->assertEquals(Ubki\Data\Language::ENG(), $this->element->language);
    }
}
