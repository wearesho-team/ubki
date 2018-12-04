<?php

namespace Wearesho\Bobra\Ubki\Tests\Unit\Data\Elements;

use Carbon\Carbon;
use PHPUnit\Framework\TestCase;
use Wearesho\Bobra\Ubki;

/**
 * Class DocumentTest
 * @package Wearesho\Bobra\Ubki\Tests\Unit\Data\Elements
 * @coversDefaultClass \Wearesho\Bobra\Ubki\Data\Elements\Document
 * @internal
 */
class DocumentTest extends TestCase
{
    protected const CREATED_AT = '2018-03-12';
    protected const SERIAL = 'testSerial';
    protected const NUMBER = 'testNumber';
    protected const ISSUE = 'testIssue';
    protected const ISSUE_DATE = '2018-03-14';
    protected const TERMIN = '2020-01-01';

    /** @var Ubki\Data\Elements\Document */
    protected $fakeDocument;

    protected function setUp(): void
    {
        $this->fakeDocument = new Ubki\Data\Elements\Document(
            Carbon::parse(static::CREATED_AT),
            Ubki\Dictionaries\Language::RUS(),
            Ubki\Dictionaries\DocumentType::DIPLOMA(),
            static::SERIAL,
            static::NUMBER,
            static::ISSUE,
            Carbon::parse(static::ISSUE_DATE),
            Carbon::parse(static::TERMIN)
        );
    }

    public function testJsonSerialize(): void
    {
        $this->assertArraySubset(
            [
                Ubki\Data\Interfaces\Document::CREATED_AT => Carbon::parse(static::CREATED_AT),
                Ubki\Data\Interfaces\Document::LANGUAGE => Ubki\Dictionaries\Language::RUS(),
                Ubki\Data\Interfaces\Document::TYPE => Ubki\Dictionaries\DocumentType::DIPLOMA(),
                Ubki\Data\Interfaces\Document::SERIAL => static::SERIAL,
                Ubki\Data\Interfaces\Document::NUMBER => static::NUMBER,
                Ubki\Data\Interfaces\Document::ISSUE => static::ISSUE,
                Ubki\Data\Interfaces\Document::ISSUE_DATE => Carbon::parse(static::ISSUE_DATE),
                Ubki\Data\Interfaces\Document::TERMIN => Carbon::parse(static::TERMIN),
            ],
            $this->fakeDocument->jsonSerialize()
        );
    }

    public function testTag(): void
    {
        $this->assertEquals(
            Ubki\Data\Interfaces\Document::TAG,
            $this->fakeDocument->tag()
        );
    }

    public function testGetIssue(): void
    {
        $this->assertEquals(
            static::ISSUE,
            $this->fakeDocument->getIssue()
        );
    }

    public function testGetTermin(): void
    {
        $this->assertEquals(
            static::TERMIN,
            Carbon::instance($this->fakeDocument->getTermin())->toDateString()
        );
    }

    public function testGetSerial(): void
    {
        $this->assertEquals(
            static::SERIAL,
            $this->fakeDocument->getSerial()
        );
    }

    public function testGetType(): void
    {
        $this->assertEquals(
            Ubki\Dictionaries\DocumentType::DIPLOMA(),
            $this->fakeDocument->getType()
        );
    }

    public function testGetNumber(): void
    {
        $this->assertEquals(
            static::NUMBER,
            $this->fakeDocument->getNumber()
        );
    }

    public function testGetIssueDate(): void
    {
        $this->assertEquals(
            static::ISSUE_DATE,
            Carbon::instance($this->fakeDocument->getIssueDate())->toDateString()
        );
    }

    public function testGetCreatedAt(): void
    {
        $this->assertEquals(
            static::CREATED_AT,
            Carbon::instance($this->fakeDocument->getCreatedAt())->toDateString()
        );
    }

    public function testGetLanguage(): void
    {
        $this->assertEquals(
            Ubki\Dictionaries\Language::RUS(),
            $this->fakeDocument->getLanguage()
        );
    }
}
