<?php

declare(strict_types=1);

namespace Wearesho\Bobra\Ubki\Tests\Unit\Data;

use Carbon\Carbon;
use Wearesho\Bobra\Ubki;

/**
 * Class DocumentTest
 * @package Wearesho\Bobra\Ubki\Tests\Unit\Data
 */
class DocumentTest extends Ubki\Tests\Unit\TestCase
{
    protected const CREATED_AT = '2018-03-12';
    protected const SERIAL = 'AF';
    protected const NUMBER = '123456';
    protected const ISSUE = 'issue';
    protected const ISSUE_DATE = '2018-03-12';
    protected const TERMIN = '2020-03-12';

    /** @var Ubki\Data\Document */
    protected $document;

    protected function setUp(): void
    {
        $this->document = new Ubki\Data\Document(
            Carbon::parse(static::CREATED_AT),
            Ubki\Dictionary\Language::ENG(),
            Ubki\Dictionary\Document::PASSPORT(),
            static::SERIAL,
            static::NUMBER,
            static::ISSUE,
            Carbon::parse(static::ISSUE_DATE),
            Carbon::parse(static::TERMIN)
        );
    }

    public function testGetCreatedAt(): void
    {
        $this->assertEquals(Carbon::parse(static::CREATED_AT), $this->document->getCreatedAt());
    }

    public function testGetLanguage(): void
    {
        $this->assertEquals(Ubki\Dictionary\Language::ENG(), $this->document->getLanguage());
    }

    public function testGetType(): void
    {
        $this->assertEquals(Ubki\Dictionary\Document::PASSPORT(), $this->document->getType());
    }

    public function testGetSerial(): void
    {
        $this->assertEquals(static::SERIAL, $this->document->getSerial());
    }

    public function testInvalidSerial(): void
    {
        $invalidSerial = 'invalidSerial+';
        $this->expectValidationException($invalidSerial, Ubki\Validator::PASSPORT_SERIES());

        new Ubki\Data\Document(
            Carbon::parse(static::CREATED_AT),
            Ubki\Dictionary\Language::ENG(),
            Ubki\Dictionary\Document::PASSPORT(),
            $invalidSerial,
            static::NUMBER,
            static::ISSUE,
            Carbon::parse(static::ISSUE_DATE)
        );
    }

    public function testGetNumber(): void
    {
        $this->assertEquals(static::NUMBER, $this->document->getNumber());
    }

    public function testInvalidNumber(): void
    {
        $invalidNumber = 'invalidNumber+';
        $this->expectValidationException($invalidNumber, Ubki\Validator::DOCUMENT_NUMBER());

        new Ubki\Data\Document(
            Carbon::parse(static::CREATED_AT),
            Ubki\Dictionary\Language::ENG(),
            Ubki\Dictionary\Document::PASSPORT(),
            static::SERIAL,
            $invalidNumber,
            static::ISSUE,
            Carbon::parse(static::ISSUE_DATE),
            Carbon::parse(static::TERMIN)
        );
    }

    public function testGetIssue(): void
    {
        $this->assertEquals(static::ISSUE, $this->document->getIssue());
    }

    public function testInvalidIssue(): void
    {
        $invalidIssue = 'invalidIssue+';
        $this->expectValidationException($invalidIssue, Ubki\Validator::DOCUMENT_ISSUE());

        new Ubki\Data\Document(
            Carbon::parse(static::CREATED_AT),
            Ubki\Dictionary\Language::ENG(),
            Ubki\Dictionary\Document::PASSPORT(),
            static::SERIAL,
            static::NUMBER,
            $invalidIssue,
            Carbon::parse(static::ISSUE_DATE),
            Carbon::parse(static::TERMIN)
        );
    }

    public function testGetIssueDate(): void
    {
        $this->assertEquals(Carbon::parse(static::ISSUE_DATE), $this->document->getIssueDate());
    }

    public function testGetTermin(): void
    {
        $this->assertEquals(Carbon::parse(static::TERMIN), $this->document->getTermin());
    }
}
