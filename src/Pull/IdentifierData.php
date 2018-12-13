<?php

namespace Wearesho\Bobra\Ubki\Pull;

use Wearesho\Bobra\Ubki;

/**
 * Class IdentifierData
 * @package Wearesho\Bobra\Ubki\Pull
 */
class IdentifierData extends Ubki\Infrastructure\Element implements Ubki\Infrastructure\ElementInterface
{
    public const TAG = 'i';
    public const LANGUAGE = 'reqlng';

    /** @var Ubki\Dictionaries\Language */
    protected $language;

    /** @var Identification */
    protected $identification;

    /** @var Collections\Contacts|null */
    protected $contacts;

    /** @var Collections\Documents|null */
    protected $documents;

    public function __construct(
        Ubki\Dictionaries\Language $language,
        Identification $identification,
        Collections\Contacts $contacts = null,
        Collections\Documents $documents = null
    ) {
        $this->language = $language;
        $this->identification = $identification;
        $this->contacts = $contacts;
        $this->documents = $documents;
    }

    public function jsonSerialize(): array
    {
        return [
            Identification::TAG => $this->identification->jsonSerialize(),
            Collections\Contacts::TAG => array_map(function (Contact $contact) {
                return $contact->jsonSerialize();
            }, $this->contacts->jsonSerialize()),
            Collections\Documents::TAG => array_map(function (Document $document) {
                return $document->jsonSerialize();
            }, $this->documents->jsonSerialize()),
        ];
    }

    public function getIdentification(): Identification
    {
        return $this->identification;
    }

    public function getContacts(): ?Collections\Contacts
    {
        return $this->contacts;
    }

    public function getDocuments(): ?Collections\Documents
    {
        return $this->documents;
    }

    public function getLanguage(): Language
    {
        return $this->language;
    }
}
