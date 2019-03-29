<?php

namespace Wearesho\Bobra\Ubki\Pull\Element;

use Wearesho\Bobra\Ubki;

/**
 * Trait RequestContentTrait
 * @package Wearesho\Bobra\Ubki\Pull\Element
 */
trait RequestContentTrait
{
    /** @var Ubki\Dictionary\Language */
    protected $language;

    /** @var Identification */
    protected $identification;

    /** @var Ubki\Pull\Collection\Contacts|null */
    protected $contacts;

    /** @var Ubki\Pull\Collection\Documents|null */
    protected $documents;

    public function getIdentification(): Identification
    {
        return $this->identification;
    }

    public function getContacts(): ?Ubki\Pull\Collection\Contacts
    {
        return $this->contacts;
    }

    public function getDocuments(): ?Ubki\Pull\Collection\Documents
    {
        return $this->documents;
    }

    public function getLanguage(): Ubki\Dictionary\Language
    {
        return $this->language;
    }
}
