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

    /** @var Ubki\Dictionary\Language */
    protected $language;

    /** @var Ubki\Dictionary\DocumentType */
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

    public function getCreatedAt(): \DateTimeInterface
    {
        return $this->createdAt;
    }

    public function getLanguage(): Ubki\Dictionary\Language
    {
        return $this->language;
    }

    public function getType(): Ubki\Dictionary\DocumentType
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

    public function associativeAttributes(): array
    {
        return [
            Ubki\Data\Interfaces\Document::TYPE => $this->getType(),
            Ubki\Data\Interfaces\Document::CREATED_AT => $this->getCreatedAt(),
            Ubki\Data\Interfaces\Document::ISSUE_DATE => $this->getIssueDate(),
            Ubki\Data\Interfaces\Document::LANGUAGE => $this->getLanguage(),
            Ubki\Data\Interfaces\Document::NUMBER => $this->getNumber(),
            Ubki\Data\Interfaces\Document::SERIAL => $this->getSerial(),
            Ubki\Data\Interfaces\Document::TERMIN => $this->getTermin(),
            Ubki\Data\Interfaces\Document::ISSUE => $this->getIssue(),
        ];
    }
}
