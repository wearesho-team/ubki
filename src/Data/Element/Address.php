<?php

namespace Wearesho\Bobra\Ubki\Data\Element;

use Wearesho\Bobra\Ubki;

/**
 * Class Address
 * @package Wearesho\Bobra\Ubki\Data\Element
 */
class Address extends Ubki\Infrastructure\Element implements Ubki\Data\Interfaces\Address
{
    use Ubki\Data\Traits\Address;

    public const TAG = 'addr';

    public function __construct(
        \DateTimeInterface $createdAt,
        Ubki\Dictionary\Language $language,
        Ubki\Dictionary\AddressType $addressType,
        string $country,
        string $city,
        string $street,
        string $house,
        string $index = null,
        string $state = null,
        string $area = null,
        Ubki\Dictionary\CityType $cityType = null,
        string $corpus = null,
        string $flat = null,
        string $fullAddress = null
    ) {
        $this->createdAt = $createdAt;
        $this->language = $language;
        $this->addressType = $addressType;
        $this->country = $country;
        $this->city = $city;
        $this->street = $street;
        $this->house = $house;
        $this->index = $index;
        $this->state = $state;
        $this->area = $area;
        $this->cityType = $cityType;
        $this->corpus = $corpus;
        $this->flat = $flat;
        $this->fullAddress = $fullAddress;
    }
}
