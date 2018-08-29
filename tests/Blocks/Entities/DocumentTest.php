<?php

namespace Wearesho\Bobra\Ubki\Tests\Blocks\Entities;

use Carbon\Carbon;

use PHPUnit\Framework\TestCase;

use Wearesho\Bobra\Ubki\Blocks\Entities\Document;
use Wearesho\Bobra\Ubki\References;

/**
 * Class DocumentTest
 * @package Wearesho\Bobra\Ubki\Tests\Blocks\Entities
 * @coversDefaultClass Document
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

    /** @var Document */
    protected $fakeDocument;

    protected function setUp(): void
    {
        $this->fakeDocument = new Document(
            Carbon::parse(static::CREATED_AT),
            References\Language::RUS(),
            References\DocumentType::DIPLOMA(),
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
                'createdAt' => static::CREATED_AT,
                'language' => References\Language::RUS()->getKey(),
                'type' => References\DocumentType::DIPLOMA()->getKey(),
                'serial' => static::SERIAL,
                'number' => static::NUMBER,
                'issue' => static::ISSUE,
                'issueDate' => static::ISSUE_DATE,
                'termin' => static::TERMIN,
            ],
            $this->fakeDocument->jsonSerialize()
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
            References\DocumentType::DIPLOMA(),
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
            References\Language::RUS(),
            $this->fakeDocument->getLanguage()
        );
    }
}
