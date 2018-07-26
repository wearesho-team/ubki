<?php

namespace Wearesho\Bobra\Ubki\Data\Credential;

use Wearesho\Bobra\Ubki;

/**
 * Class Entity
 * @package Wearesho\Bobra\Ubki\Data\Credential
 */
class Entity extends Ubki\Element
{
    /** @var array */
    protected $identifiers;

    /** @var array|null */
    protected $legalIdentifiers;

    /** @var array|null */
    protected $works;

    /** @var array */
    protected $documents;

    /** @var array */
    protected $addresses;

    /** @var array|null */
    protected $photos;

    public function __construct(
        array $identifiers,
        array $documents,
        array $addresses,
        ?array $works = null,
        ?array $legalIdentifiers = null,
        ?array $photos = null
    ) {
        $this->identifiers = $identifiers;
        $this->legalIdentifiers = $legalIdentifiers;
        $this->works = $works;
        $this->documents = $documents;
        $this->addresses = $addresses;
        $this->photos = $photos;
    }

    public function tag(): string
    {
        return 'cki';
    }

    public function getIdentifiers(): array
    {
        return $this->identifiers;
    }

    public function getLegalIdentifiers(): ?array
    {
        return $this->legalIdentifiers;
    }

    public function getWorks(): ?array
    {
        return $this->works;
    }

    public function getDocuments(): array
    {
        return $this->documents;
    }

    public function getAddresses(): array
    {
        return $this->addresses;
    }

    public function getPhotos(): ?array
    {
        return $this->photos;
    }
}
