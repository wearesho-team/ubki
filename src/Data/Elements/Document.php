<?php

namespace Wearesho\Bobra\Ubki\Data\Elements;

use Wearesho\Bobra\Ubki\Dictionaries;
use Wearesho\Bobra\Ubki\Data;
use Wearesho\Bobra\Ubki\Infrastructure;

/**
 * Class Document
 * @package Wearesho\Bobra\Ubki\Data\Elements
 */
class Document extends Infrastructure\Element implements Data\Interfaces\Document
{
    use Data\Traits\Document;

    public function __construct(
        \DateTimeInterface $createdAt,
        Dictionaries\Language $language,
        Dictionaries\DocumentType $type,
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
