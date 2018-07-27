<?php

namespace Wearesho\Bobra\Ubki\Tests\Data\Identifier;

use Carbon\Carbon;

use PHPUnit\Framework\TestCase;

use Wearesho\Bobra\Ubki;

/**
 * Class EntityTestCase
 * @package Wearesho\Bobra\Ubki\Tests\Data\Identifier
 */
abstract class EntityTestCase extends Ubki\Tests\Extend\ElementTestCase
{
    /** @var Ubki\Data\Identifier\Entity */
    protected $element;

    public function testGetCreatedAt(): void
    {
        $this->assertEquals(
            Carbon::create(
                2020,
                3,
                12,
                10,
                5,
                7
            ),
            $this->element->getCreatedAt()
        );
    }

    public function testGetName(): void
    {
        $this->assertEquals('name', $this->element->getName());
    }

    public function testGetLanguage(): void
    {
        $this->assertEquals(Ubki\Data\Language::ENG(), $this->element->getLanguage());
    }
}
