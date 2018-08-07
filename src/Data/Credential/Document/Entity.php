<?php

namespace Wearesho\Bobra\Ubki\Data\Credential\Document;

use Carbon\Carbon;

use Wearesho\Bobra\Ubki;

/**
 * Class Entity
 * @package Wearesho\Bobra\Ubki\Data\Credential\Document
 *
 * @property-read \DateTimeInterface $createdAt
 * @property-read Ubki\Data\Language $language
 * @property-read Type $type
 * @property-read string $serial
 * @property-read string $number
 * @property-read string $issue
 * @property-read \DateTimeInterface $issueDate
 * @property-read \DateTimeInterface|null $termin
 */
class Entity extends Ubki\Element implements \JsonSerializable
{
    public const TAG = 'doc';

    public const CREATED_AT = 'vdate';
    public const LANGUAGE = 'lng';
    public const TYPE = 'dtype';
    public const SERIAL = 'dser';
    public const NUMBER = 'dnom';
    public const TERMIN = 'dterm';
    public const ISSUE = 'dwho';
    public const ISSUE_DATE = 'dwdt';

    public function __construct(
        \DateTimeInterface $createdAt,
        Ubki\Data\Language $language,
        Type $type,
        string $serial,
        string $number,
        string $issue,
        \DateTimeInterface $issueDate,
        ?\DateTimeInterface $termin = null
    ) {
        parent::__construct([
            'createdAt' => $createdAt,
            'language' => $language,
            'type' => $type,
            'serial' => $serial,
            'number' => $number,
            'issue' => $issue,
            'issueDate' => $issueDate,
            'termin' => $termin
        ]);
    }

    public function jsonSerialize(): array
    {
        return [
            'createdAt' => Carbon::instance($this->createdAt)->toDateString(),
            'language' => (string)$this->language,
            'type' => (string)$this->type,
            'serial' => $this->serial,
            'number' => $this->number,
            'issue' => $this->issue,
            'issueDate' => Carbon::instance($this->issueDate)->toDateString(),
            'termin' => !is_null($this->termin) ? Carbon::instance($this->termin)->toDateString() : null,
        ];
    }
}
