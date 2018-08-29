<?php

namespace Wearesho\Bobra\Ubki\Blocks\Entities;

use Carbon\Carbon;

use Wearesho\Bobra\Ubki\Element;
use Wearesho\Bobra\Ubki\References;

/**
 * Class Document
 * @package Wearesho\Bobra\Ubki\Blocks\Entities
 */
class Document extends Element implements \JsonSerializable
{
    public const TAG = 'doc';
    public const CREATED_AT = 'vdate';
    public const LANGUAGE = 'lng';
    public const LANGUAGE_REF = 'lngref';
    public const TYPE = 'dtype';
    public const TYPE_REF = 'dtyperef';
    public const SERIAL = 'dser';
    public const NUMBER = 'dnom';
    public const TERMIN = 'dterm';
    public const ISSUE = 'dwho';
    public const ISSUE_DATE = 'dwdt';

    /** @var \DateTimeInterface */
    protected $createdAt;

    /** @var References\Language */
    protected $language;

    /** @var References\DocumentType */
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

    public function __construct(
        \DateTimeInterface $createdAt,
        References\Language $language,
        References\DocumentType $type,
        string $serial,
        string $number,
        string $issue,
        \DateTimeInterface $issueDate,
        ?\DateTimeInterface $termin = null
    ) {
        $this->createdAt = $createdAt;
        $this->language = $language;
        $this->type = $type;
        $this->serial = $serial;
        $this->number = $number;
        $this->issue = $issue;
        $this->issueDate = $issueDate;
        $this->termin = $termin;
    }


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

    public function getLanguage(): References\Language
    {
        return $this->language;
    }

    public function getType(): References\DocumentType
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
