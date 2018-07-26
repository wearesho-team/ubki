<?php


namespace Wearesho\Bobra\Ubki\Tests\Data\Document;

use Carbon\Carbon;
use Wearesho\Bobra\Ubki;

/**
 * Class EntityTest
 * @internal
 * @package Wearesho\Bobra\Ubki\Tests\Data\Document
 */
class EntityTest extends Ubki\Tests\Extend\ElementTestCase
{
    protected const TAG = 'doc';

    /** @var Ubki\Data\Document\Entity */
    protected $element;

    protected function setUp(): void
    {
        $this->element = new Ubki\Data\Document\Entity(
            Carbon::create(2020, 3, 12, 10, 5, 7),
            Ubki\Data\Language::ENG('английский'),
            Ubki\Data\Document\Type::PASSPORT(),
            'AS',
            '321654',
            'Someone',
            Carbon::create(2016, 3, 12)
        );
    }

    public function testGetType(): void
    {
        $this->assertEquals(Ubki\Data\Document\Type::PASSPORT(), $this->element->getType());
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
        $this->assertEquals(Ubki\Data\Language::ENG('английский'), $this->element->getLanguage());
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
