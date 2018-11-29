<?php

namespace Wearesho\Bobra\Ubki\Data\Traits;

use Wearesho\Bobra\Ubki\Data\Interfaces;
use Wearesho\Bobra\Ubki\Dictionaries;

/**
 * Trait Address
 * @package Wearesho\Bobra\Ubki\Data\Traits
 */
trait Address
{
    /** @var \DateTimeInterface */
    protected $createdAt;

    /** @var Dictionaries\Language */
    protected $language;

    /** @var Dictionaries\AddressType */
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

    /** @var Dictionaries\CityType */
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
            Interfaces\Address::TYPE => $this->addressType,
            Interfaces\Address::LANGUAGE => $this->language,
            Interfaces\Address::CREATED_AT => $this->createdAt,
            Interfaces\Address::AREA => $this->area,
            Interfaces\Address::FULL_ADDRESS => $this->fullAddress,
            Interfaces\Address::COUNTRY => $this->country,
            Interfaces\Address::STREET => $this->street,
            Interfaces\Address::HOUSE => $this->house,
            Interfaces\Address::CORPUS => $this->corpus,
            Interfaces\Address::INDEX => $this->index,
            Interfaces\Address::STATE => $this->state,
            Interfaces\Address::FLAT => $this->flat,
            Interfaces\Address::CITY => $this->city,
            Interfaces\Address::CITY_TYPE => $this->cityType,
        ];
    }

    public function tag(): string
    {
        return Interfaces\Address::TAG;
    }

    public function getCreatedAt(): \DateTimeInterface
    {
        return $this->createdAt;
    }

    public function getLanguage(): Dictionaries\Language
    {
        return $this->language;
    }

    public function getAddressType(): Dictionaries\AddressType
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

    public function getCityType(): ?Dictionaries\CityType
    {
        return $this->cityType;
    }
}
