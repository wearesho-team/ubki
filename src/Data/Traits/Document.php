<?php

namespace Wearesho\Bobra\Ubki\Data\Traits;

use Carbon\Carbon;
use Wearesho\Bobra\Ubki\Dictionaries;
use Wearesho\Bobra\Ubki\Data\Interfaces;

/**
 * Trait Document
 * @package Wearesho\Bobra\Ubki\Data\Traits
 */
trait Document
{
    /** @var \DateTimeInterface */
    protected $createdAt;

    /** @var Dictionaries\Language */
    protected $language;

    /** @var Dictionaries\DocumentType */
    protected $type;

    /** @var string */
    protected $serial;

    /** @var string */
    protected $number;

    /** @var string */
    protected $issue;

    /** @var \DateTimeInterface */
    protected $issueDate;

    /** @var \DateTimeInterface|null */
    protected $termin;

    public function jsonSerialize(): array
    {
        return [
            Interfaces\Document::CREATED_AT => $this->createdAt,
            Interfaces\Document::LANGUAGE => $this->language,
            Interfaces\Document::TYPE => $this->type,
            Interfaces\Document::SERIAL => $this->serial,
            Interfaces\Document::NUMBER => $this->number,
            Interfaces\Document::ISSUE => $this->issue,
            Interfaces\Document::ISSUE_DATE => $this->issueDate,
            Interfaces\Document::TERMIN => $this->termin,
        ];
    }

    public function tag(): string
    {
        return Interfaces\Document::TAG;
    }

    public function getCreatedAt(): \DateTimeInterface
    {
        return $this->createdAt;
    }

    public function getLanguage(): Dictionaries\Language
    {
        return $this->language;
    }

    public function getType(): Dictionaries\DocumentType
    {
        return $this->type;
    }

    public function getSerial(): string
    {
        return $this->serial;
    }

    public function getNumber(): string
    {
        return $this->number;
    }

    public function getIssue(): string
    {
        return $this->issue;
    }

    public function getIssueDate(): \DateTimeInterface
    {
        return $this->issueDate;
    }

    public function getTermin(): ?\DateTimeInterface
    {
        return $this->termin;
    }
}
