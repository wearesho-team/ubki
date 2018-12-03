<?php

namespace Wearesho\Bobra\Ubki\Data\Elements;

use Wearesho\Bobra\Ubki;

/**
 * Class Document
 * @package Wearesho\Bobra\Ubki\Data\Elements
 */
class Document extends Ubki\Infrastructure\Element implements Ubki\Data\Interfaces\Document
{
    use Ubki\Data\Traits\Document;

    public function __construct(
        \DateTimeInterface $createdAt,
        Ubki\Dictionaries\Language $language,
        Ubki\Dictionaries\DocumentType $type,
        string $serial,
        string $number,
        string $issue,
        \DateTimeInterface $issueDate,
        \DateTimeInterface $termin = null
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
}
