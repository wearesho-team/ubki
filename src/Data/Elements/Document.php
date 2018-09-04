<?php

namespace Wearesho\Bobra\Ubki\Data\Elements;

use Wearesho\Bobra\Ubki\References;
use Wearesho\Bobra\Ubki\Data;

/**
 * Class Document
 * @package Wearesho\Bobra\Ubki\Data\Elements
 */
class Document implements Data\Interfaces\Document
{
    use Data\Traits\Document;

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
}
