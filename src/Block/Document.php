<?php

namespace Wearesho\Bobra\Ubki\Block;

/**
 * Class Document
 * <doc> tag
 * @package Wearesho\Bobra\Ubki\Block
 */
class Document
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

    /**
     * Created date of this block
     * vdate attribute
     * @var \DateTimeInterface
     */
    protected $createdAt;

    /**
     * Language of this block
     * lng attribute
     * @var int
     */
    protected $language;

    /**
     * Type of this document
     * dtype attribute
     * @var int
     */
    protected $type;

    /**
     * Serial code of this document
     * dser attribute
     * @var string
     */
    protected $serial;

    /**
     * Number of this document
     * dnom attribute
     * @var string
     */
    protected $number;

    /**
     * Validity period
     * dterm attribute
     * @var \DateTimeInterface
     */
    protected $termin;

    /**
     * By whom the document was issued
     * dwho attribute
     * @var string
     */
    protected $issue;

    /**
     * When the document was issued
     * dwdt attribute
     * @var \DateTimeInterface
     */
    protected $issueDate;

    /**
     * Document constructor.
     *
     * @param \DateTimeInterface $createdAt
     * @param int                $language
     * @param int                $type
     * @param string             $serial
     * @param string             $number
     * @param \DateTimeInterface $termin
     * @param string             $issue
     * @param \DateTimeInterface $issueDate
     */
    public function __construct(
        \DateTimeInterface $createdAt,
        int $language,
        int $type,
        string $serial,
        string $number,
        \DateTimeInterface $termin,
        string $issue,
        \DateTimeInterface $issueDate
    ) {
        $this->createdAt = $createdAt;
        $this->language = $language;
        $this->type = $type;
        $this->serial = $serial;
        $this->number = $number;
        $this->termin = $termin;
        $this->issue = $issue;
        $this->issueDate = $issueDate;
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

    public function getTermin(): \DateTimeInterface
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
