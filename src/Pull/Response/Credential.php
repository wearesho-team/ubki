<?php

namespace Wearesho\Bobra\Ubki\Pull\Response;

use Wearesho\Bobra\Ubki\Language;

/**
 * Class Credential
 * @package Wearesho\Bobra\Ubki\Pull\Response
 */
class Credential
{
    /** @var IdentificationCollection */
    protected $identifications;

    /** @var WorkCollection */
    protected $works;

    /** @var DocumentCollection */
    protected $documents;

    /** @var AddressCollection */
    protected $addresses;

    /** @var \DateTimeInterface */
    protected $birthDate;

    /** @var Language */
    protected $language;

    public function __construct(
        string $firstName,
        string $middleName,
        string $lastName,
        \DateTimeInterface $birthDate,
        Language $language,
        int $inn,
        IdentificationCollection $identificationCollection,
        WorkCollection $workCollection,
        DocumentCollection $documentCollection,
        AddressCollection $addressCollection
    ) {
        $this->identifications = $identificationCollection;
        $this->works = $workCollection;
        $this->documents = $documentCollection;
        $this->addresses = $addressCollection;
    }

    public function getIdentifications(): IdentificationCollection
    {
        return $this->identifications;
    }

    public function getWorks(): WorkCollection
    {
        return $this->works;
    }

    public function getDocuments(): DocumentCollection
    {
        return $this->documents;
    }

    public function getAdresses(): AddressCollection
    {
        return $this->addresses;
    }
}
