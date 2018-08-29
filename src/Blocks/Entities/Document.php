<?php

namespace Wearesho\Bobra\Ubki\Blocks\Entities;

use Wearesho\Bobra\Ubki\References;
use Wearesho\Bobra\Ubki\Blocks;

/**
 * Class Document
 * @package Wearesho\Bobra\Ubki\Blocks\Entities
 */
class Document implements Blocks\Interfaces\Document
{
    use Blocks\Traits\Document;

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
