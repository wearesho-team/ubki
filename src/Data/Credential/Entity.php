<?php

namespace Wearesho\Bobra\Ubki\Data\Credential;

use Wearesho\Bobra\Ubki;

/**
 * Class Entity
 * @package Wearesho\Bobra\Ubki\Data\Credential
 */
class Entity extends Ubki\Element
{
    /** @var Ubki\Data\Identifier\Collection */
    protected $identifiers;

    /** @var array|null */
    protected $works;

    /** @var array */
    protected $documents;

    /** @var Ubki\Data\Address\Collection */
    protected $addresses;

    /** @var array|null */
    protected $photos;

    public function __construct(
        Ubki\Data\Identifier\Collection $identifiers,
        array $documents,
        Ubki\Data\Address\Collection $addresses,
        ?array $works = null,
        ?array $photos = null
    ) {
        $this->identifiers = $identifiers;
        $this->works = $works;
        $this->documents = $documents;
        $this->addresses = $addresses;
        $this->photos = $photos;
    }

    public function tag(): string
    {
        return 'cki';
    }

    public function getIdentifiers(): Ubki\Data\Identifier\Collection
    {
        return $this->identifiers;
    }

    public function getWorks(): ?array
    {
        return $this->works;
    }

    public function getDocuments(): array
    {
        return $this->documents;
    }

    public function getAddresses(): Ubki\Data\Address\Collection
    {
        return $this->addresses;
    }

    public function getPhotos(): ?array
    {
        return $this->photos;
    }
}
