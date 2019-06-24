<?php

declare(strict_types=1);

namespace Wearesho\Bobra\Ubki\Data;

use Carbon\Carbon;
use Wearesho\Bobra\Ubki;

/**
 * Class Document
 * @package Wearesho\Bobra\Ubki\Data
 *
 * @method static Document make(...$arguments)
 */
class Document implements Ubki\Contract\Data\Document, \JsonSerializable
{
    use Makeable, Tagable;

    /** @var \DateTimeInterface */
    protected $createdAt;

    /** @var Ubki\Dictionary\Language */
    protected $language;

    /** @var Ubki\Dictionary\Document */
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
        Ubki\Dictionary\Language $language,
        Ubki\Dictionary\Document $type,
        string $serial,
        string $number,
        string $issue,
        \DateTimeInterface $issueDate,
        \DateTimeInterface $termin = \null
    ) {
        Ubki\Validator::PASSPORT_SERIES()->validate($serial);
        Ubki\Validator::DOCUMENT_NUMBER()->validate($number);
        Ubki\Validator::DOCUMENT_ISSUE()->validate($issue);

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
            'createdAt' => Carbon::make($this->createdAt),
            'language' => $this->language,
            'type' => $this->type,
            'serial' => $this->serial,
            'number' => $this->number,
            'issue' => $this->issue,
            'issueDate' => Carbon::make($this->issueDate),
            'termin' => Carbon::make($this->termin),
        ];
    }

    public static function tag(): string
    {
        return 'doc';
    }

    public function getCreatedAt(): \DateTimeInterface
    {
        return $this->createdAt;
    }

    public function getLanguage(): Ubki\Dictionary\Language
    {
        return $this->language;
    }

    public function getType(): Ubki\Dictionary\Document
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
