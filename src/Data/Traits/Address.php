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

    public function jsonSerialize(): array
    {
        return [
            Ubki\Data\Interfaces\Address::TYPE => $this->addressType,
            Ubki\Data\Interfaces\Address::LANGUAGE => $this->language,
            Ubki\Data\Interfaces\Address::CREATED_AT => $this->createdAt,
            Ubki\Data\Interfaces\Address::AREA => $this->area,
            Ubki\Data\Interfaces\Address::FULL_ADDRESS => $this->fullAddress,
            Ubki\Data\Interfaces\Address::COUNTRY => $this->country,
            Ubki\Data\Interfaces\Address::STREET => $this->street,
            Ubki\Data\Interfaces\Address::HOUSE => $this->house,
            Ubki\Data\Interfaces\Address::CORPUS => $this->corpus,
            Ubki\Data\Interfaces\Address::INDEX => $this->index,
            Ubki\Data\Interfaces\Address::STATE => $this->state,
            Ubki\Data\Interfaces\Address::FLAT => $this->flat,
            Ubki\Data\Interfaces\Address::CITY => $this->city,
            Ubki\Data\Interfaces\Address::CITY_TYPE => $this->cityType,
        ];
    }

    public function tag(): string
    {
        return Ubki\Data\Interfaces\Address::TAG;
    }

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
}
