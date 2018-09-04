<?php

namespace Wearesho\Bobra\Ubki\Data\Traits;

use Carbon\Carbon;

use Wearesho\Bobra\Ubki\ElementTrait;
use Wearesho\Bobra\Ubki\Dictionaries;

/**
 * Trait Document
 * @package Wearesho\Bobra\Ubki\Data\Traits
 */
trait Document
{
    use ElementTrait;

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
            'createdAt' => Carbon::instance($this->createdAt)->toDateString(),
            'language' => $this->language->__toString(),
            'type' => $this->type->__toString(),
            'serial' => $this->serial,
            'number' => $this->number,
            'issue' => $this->issue,
            'issueDate' => Carbon::instance($this->issueDate)->toDateString(),
            'termin' => !is_null($this->termin) ? Carbon::instance($this->termin)->toDateString() : null,
        ];
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
