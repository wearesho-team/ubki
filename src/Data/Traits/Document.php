<?php

namespace Wearesho\Bobra\Ubki\Data\Traits;

use Wearesho\Bobra\Ubki;

/**
 * Trait Document
 * @package Wearesho\Bobra\Ubki\Data\Traits
 */
trait Document
{
    /** @var \DateTimeInterface */
    protected $createdAt;

    /** @var Ubki\Dictionaries\Language */
    protected $language;

    /** @var Ubki\Dictionaries\DocumentType */
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
            Ubki\Data\Interfaces\Document::CREATED_AT => $this->createdAt,
            Ubki\Data\Interfaces\Document::LANGUAGE => $this->language,
            Ubki\Data\Interfaces\Document::TYPE => $this->type,
            Ubki\Data\Interfaces\Document::SERIAL => $this->serial,
            Ubki\Data\Interfaces\Document::NUMBER => $this->number,
            Ubki\Data\Interfaces\Document::ISSUE => $this->issue,
            Ubki\Data\Interfaces\Document::ISSUE_DATE => $this->issueDate,
            Ubki\Data\Interfaces\Document::TERMIN => $this->termin,
        ];
    }

    public function tag(): string
    {
        return Ubki\Data\Interfaces\Document::TAG;
    }

    public function getCreatedAt(): \DateTimeInterface
    {
        return $this->createdAt;
    }

    public function getLanguage(): Ubki\Dictionaries\Language
    {
        return $this->language;
    }

    public function getType(): Ubki\Dictionaries\DocumentType
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
