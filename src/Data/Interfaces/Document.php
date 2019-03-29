<?php

namespace Wearesho\Bobra\Ubki\Data\Interfaces;

use Wearesho\Bobra\Ubki;

/**
 * Interface Document
 * @package Wearesho\Bobra\Ubki\Data\Interfaces
 */
interface Document extends Ubki\Infrastructure\ElementInterface
{
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

    public function getCreatedAt(): \DateTimeInterface;

    public function getLanguage(): Ubki\Dictionary\Language;

    public function getType(): Ubki\Dictionary\Document;

    public function getSerial(): string;

    public function getNumber(): string;

    public function getIssue(): string;

    public function getIssueDate(): \DateTimeInterface;

    public function getTermin(): ?\DateTimeInterface;
}
