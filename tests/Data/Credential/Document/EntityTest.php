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
            Carbon::create(2020, 3, 12, 10, 5, 7),
            Data\Language::ENG('английский'),
            Data\Credential\Document\Type::PASSPORT(),
            'AS',
            '321654',
            'Someone',
            Carbon::create(2016, 3, 12)
        );
    }

    public function testGetType(): void
    {
        $this->assertEquals(Data\Credential\Document\Type::PASSPORT(), $this->element->getType());
    }

    public function testGetCreatedAt(): void
    {
        $this->assertEquals(
            Carbon::create(2020, 3, 12, 10, 5, 7),
            $this->element->getCreatedAt()
        );
    }

    public function testGetIssue(): void
    {
        $this->assertEquals('Someone', $this->element->getIssue());
    }

    public function testGetIssueDate(): void
    {
        $this->assertEquals(Carbon::create(2016, 3, 12), $this->element->getIssueDate());
    }

    public function testGetLanguage(): void
    {
        $this->assertEquals(Data\Language::ENG('английский'), $this->element->getLanguage());
    }

    public function testGetSerial(): void
    {
        $this->assertEquals('AS', $this->element->getSerial());
    }

    public function testGetNumber(): void
    {
        $this->assertEquals('321654', $this->element->getNumber());
    }

    public function testGetTermin(): void
    {
        $this->assertNull($this->element->getTermin());
    }
}
