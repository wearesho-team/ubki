<?php

namespace Wearesho\Bobra\Ubki\Blocks\Entities;

use Carbon\Carbon;

use Wearesho\Bobra\Ubki\Element;
use Wearesho\Bobra\Ubki\References;

/**
 * Class Address
 * @package Wearesho\Bobra\Ubki\Blocks\Entities
 */
class Address extends Element implements \JsonSerializable
{
    public const TAG = 'addr';
    public const CREATED_AT = 'vdate';
    public const LANGUAGE = 'lng';
    public const LANGUAGE_REF = 'lngref';
    public const TYPE = 'adtype';
    public const TYPE_REF = 'adtyperef';
    public const COUNTRY = 'adcountry';
    public const INDEX = 'adindex';
    public const STATE = 'adstate';
    public const AREA = 'adarea';
    public const CITY = 'adcity';
    public const CITY_TYPE = 'adcitytype';
    public const CITY_TYPE_REF = 'adcitytyperef';
    public const STREET = 'adstreet';
    public const HOUSE = 'adhome';
    public const CORPUS = 'adcorp';
    public const FLAT = 'flat';
    public const FULL_ADDRESS = 'addrdirt';

    /** @var \DateTimeInterface */
    protected $createdAt;

    /** @var References\Language */
    protected $language;

    /** @var References\AddressType */
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

    /** @var References\CityType */
    protected $cityType;

    /** @var string|null */
    protected $corpus;

    /** @var string|null */
    protected $flat;

    /** @var string|null */
    protected $fullAddress;

    public function __construct(
        \DateTimeInterface $createdAt,
        References\Language $language,
        References\AddressType $addressType,
        string $country,
        string $city,
        string $street,
        string $house,
        ?string $index = null,
        ?string $state = null,
        ?string $area = null,
        ?References\CityType $cityType = null,
        ?string $corpus = null,
        ?string $flat = null,
        ?string $fullAddress = null
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

    public function jsonSerialize(): array
    {
        return [
            'createdAt' => Carbon::instance($this->createdAt)->toDateString(),
            'language' => $this->language->__toString(),
            'type' => $this->addressType->__toString(),
            'country' => $this->country,
            'city' => $this->city,
            'street' => $this->street,
            'house' => $this->house,
            'index' => $this->index,
            'state' => $this->state,
            'area' => $this->area,
            'cityType' => $this->cityType->__toString(),
            'corpus' => $this->corpus,
            'flat' => $this->flat,
            'fullAddress' => $this->fullAddress
        ];
    }

    public function getCreatedAt(): \DateTimeInterface
    {
        return $this->createdAt;
    }

    public function getLanguage(): References\Language
    {
        return $this->language;
    }

    public function getAddressType(): References\AddressType
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

    public function getCityType(): ?References\CityType
    {
        return $this->cityType;
    }
}
