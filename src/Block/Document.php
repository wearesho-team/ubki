<?php

namespace Wearesho\Bobra\Ubki\Block;

use Wearesho\Bobra\Ubki\BaseBlock;

/**
 * Class Document
 * @package Wearesho\Bobra\Ubki\Block
 */
class Document extends BaseBlock
{
    // attributes
    public const CREATED_AT = 'vdate';
    public const LANGUAGE = 'lng';
    public const TYPE = 'dtype';
    public const SERIAL = 'dser';
    public const NUMBER = 'dnom';
    public const TERMIN = 'dterm';
    public const ISSUE = 'dwho';
    public const ISSUE_DATE = 'dwdt';

    /** @var \DateTimeInterface */
    protected $createdAt;

    /** @var int */
    protected $language;

    /** @var int */
    protected $type;

    /** @var string */
    protected $serial;

    /** @var string */
    protected $number;

    /**
     * Important! => Required for Card id
     * @var \DateTimeInterface|null
     */
    protected $termin;

    /** @var string */
    protected $issue;

    /** @var \DateTimeInterface */
    protected $issueDate;

    public function __construct(
        \DateTimeInterface $createdAt,
        int $language,
        int $type,
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

    public function tag(): string
    {
        return 'doc';
    }

    public function getCreatedAt(): \DateTimeInterface
    {
        return $this->createdAt;
    }

    public function getLanguage(): int
    {
        return $this->language;
    }

    public function getType(): int
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

    public function getTermin(): ?\DateTimeInterface
    {
        return $this->termin;
    }

    public function getIssue(): string
    {
        return $this->issue;
    }

    public function getIssueDate(): \DateTimeInterface
    {
        return $this->issueDate;
    }
}
