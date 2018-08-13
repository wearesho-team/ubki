<?php

namespace Wearesho\Bobra\Ubki\Tests\Data\Credential\Document;

use Carbon\Carbon;

use Wearesho\Bobra\Ubki\Data;
use Wearesho\Bobra\Ubki\Tests;

/**
 * Class EntityTest
 * @internal
 * @package Wearesho\Bobra\Ubki\Tests\Data\Credential\Document
 */
class EntityTest extends Tests\Extend\ElementTestCase
{
    protected const TAG = 'doc';

    /** @var Data\Credential\Document\Entity */
    protected $element;

    protected function setUp(): void
    {
        $this->element = new Data\Credential\Document\Entity(
            Carbon::parse('2020-03-12'),
            Data\Language::ENG('английский'),
            Data\Credential\Document\Type::PASSPORT(),
            'AS',
            '321654',
            'Someone',
            Carbon::parse('2016-03-12')
        );
    }

    public function testGetters(): void
    {
        $this->assertEquals(Data\Credential\Document\Type::PASSPORT(), $this->element->type);
        $this->assertEquals(Carbon::parse('2020-03-12'), Carbon::instance($this->element->createdAt));
        $this->assertEquals('2020-03-12', Carbon::instance($this->element->createdAt)->toDateString());
        $this->assertEquals('Someone', $this->element->issue);
        $this->assertEquals(Carbon::parse('2016-03-12'), Carbon::instance($this->element->issueDate));
        $this->assertEquals('2016-03-12', Carbon::instance($this->element->issueDate)->toDateString());
        $this->assertEquals(Data\Language::ENG('английский'), $this->element->language);
        $this->assertEquals('AS', $this->element->serial);
        $this->assertEquals('321654', $this->element->number);
        $this->assertNull($this->element->termin);
    }

    public function testJsonSerialize(): void
    {
        $this->assertEquals(
            [
                'createdAt' => '2020-03-12',
                'language' => 'английский',
                'type' => 'PASSPORT',
                'serial' => 'AS',
                'number' => '321654',
                'issue' => 'Someone',
                'issueDate' => '2016-03-12',
                'termin' => null,
            ],
            $this->element->jsonSerialize()
        );
    }
}
