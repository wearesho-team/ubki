<?php

namespace Wearesho\Bobra\Ubki\Data\Traits;

use Wearesho\Bobra\Ubki;

/**
 * Trait Address
 * @package Wearesho\Bobra\Ubki\Data\Traits
 */
trait Address
{
    /** @var \DateTimeInterface */
    protected $createdAt;

    /** @var Ubki\Dictionaries\Language */
    protected $language;

    /** @var Ubki\Dictionaries\AddressType */
    protected $addressType;

    /** @var string */
    protected $country;

    /** @var string */
    protected $city;

    /** @var string */
    protected $street;

    /** @var string */
    protected $house;

    /** @var string|null */
    protected $index;

    /** @var string|null */
    protected $state;

    /** @var string|null */
    protected $area;

    /** @var Ubki\Dictionaries\CityType */
    protected $cityType;

    /** @var string|null */
    protected $corpus;

    /** @var string|null */
    protected $flat;

    /** @var string|null */
    protected $fullAddress;

    public function getCreatedAt(): \DateTimeInterface
    {
        return $this->createdAt;
    }

    public function getLanguage(): Ubki\Dictionaries\Language
    {
        return $this->language;
    }

    public function getAddressType(): Ubki\Dictionaries\AddressType
    {
        return $this->addressType;
    }

    public function getCountry(): string
    {
        return $this->country;
    }

    public function getCity(): string
    {
        return $this->city;
    }

    public function getStreet(): string
    {
        return $this->street;
    }

    public function getHouse(): string
    {
        return $this->house;
    }

    public function getIndex(): ?string
    {
        return $this->index;
    }

    public function getState(): ?string
    {
        return $this->state;
    }

    public function getArea(): ?string
    {
        return $this->area;
    }

    public function getCorpus(): ?string
    {
        return $this->corpus;
    }

    public function getFlat(): ?string
    {
        return $this->flat;
    }

    public function getFullAddress(): ?string
    {
        return $this->fullAddress;
    }

    public function getCityType(): ?Ubki\Dictionaries\CityType
    {
        return $this->cityType;
    }

    /**
     * @inheritdoc
     */
    public function associativeAttributes(): array
    {
        return [
            Ubki\Data\Interfaces\Address::LANGUAGE => $this->getLanguage(),
            Ubki\Data\Interfaces\Address::CREATED_AT => $this->getCreatedAt(),
            Ubki\Data\Interfaces\Address::TYPE => $this->getAddressType(),
            Ubki\Data\Interfaces\Address::INDEX => $this->getIndex(),
            Ubki\Data\Interfaces\Address::HOUSE => $this->getHouse(),
            Ubki\Data\Interfaces\Address::AREA => $this->getArea(),
            Ubki\Data\Interfaces\Address::STATE => $this->getState(),
            Ubki\Data\Interfaces\Address::CITY => $this->getCity(),
            Ubki\Data\Interfaces\Address::FLAT => $this->getFlat(),
            Ubki\Data\Interfaces\Address::FULL_ADDRESS => $this->getFullAddress(),
            Ubki\Data\Interfaces\Address::CORPUS => $this->getCorpus(),
            Ubki\Data\Interfaces\Address::CITY_TYPE => $this->getCityType(),
            Ubki\Data\Interfaces\Address::STREET => $this->getStreet(),
            Ubki\Data\Interfaces\Address::COUNTRY => $this->getCountry(),
        ];
    }
}
