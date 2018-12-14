<?php

namespace Wearesho\Bobra\Ubki\Pull\Elements;

use Wearesho\Bobra\Ubki;

/**
 * Trait RequestContentTrait
 * @package Wearesho\Bobra\Ubki\Pull\Elements
 */
trait RequestContentTrait
{
    /** @var Ubki\Dictionaries\Language */
    protected $language;

    /** @var Identification */
    protected $identification;

    /** @var Ubki\Pull\Collections\Contacts|null */
    protected $contacts;

    /** @var Ubki\Pull\Collections\Documents|null */
    protected $documents;

    public function getIdentification(): Identification
    {
        return $this->identification;
    }

    public function getContacts(): ?Ubki\Pull\Collections\Contacts
    {
        return $this->contacts;
    }

    public function getDocuments(): ?Ubki\Pull\Collections\Documents
    {
        return $this->documents;
    }

    public function getLanguage(): Ubki\Dictionaries\Language
    {
        return $this->language;
    }
}
