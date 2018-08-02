<?php

namespace Wearesho\Bobra\Ubki\Data\Credential\Address;

use Carbon\Carbon;
use Wearesho\Bobra\Ubki;

/**
 * Class Entity
 * @package Wearesho\Bobra\Ubki\Data\Credential\Address
 */
class Entity extends Ubki\Element implements \JsonSerializable
{
    public const TAG = 'addr';

    // attributes
    public const CREATED_AT = 'vdate';
    public const LANGUAGE = 'lng';
    public const TYPE = 'adtype';
    public const COUNTRY = 'adcountry';
    public const INDEX = 'adindex';
    public const STATE = 'adstate';
    public const AREA = 'adarea';
    public const CITY = 'adcity';
    public const CITY_TYPE = 'adcitytype';
    public const STREET = 'adstreet';
    public const HOUSE = 'adhome';
    public const CORPUS = 'adcorp';
    public const FLAT = 'flat';
    public const FULL_ADDRESS = 'addrdirt';

    /** @var \DateTimeInterface */
    protected $createdAt;

    /** @var Ubki\Data\Language */
    protected $language;

    /** @var Type */
    protected $type;

    /** @var string */
    protected $country;

    /** @var null|string */
    protected $index;

    /** @var null|string */
    protected $state;

    /** @var null|string */
    protected $area;

    /** @var string */
    protected $city;

    /** @var Ubki\Data\CityType|null */
    protected $cityType;

    /** @var string */
    protected $street;

    /** @var string */
    protected $house;

    /** @var null|string */
    protected $corpus;

    /** @var null|string */
    protected $flat;

    /** @var null|string */
    protected $fullAddress;

    public function __construct(
        \DateTimeInterface $createdAt,
        Ubki\Data\Language $language,
        Type $type,
        string $country,
        string $city,
        string $street,
        string $house,
        ?string $index = null,
        ?string $state = null,
        ?string $area = null,
        ?Ubki\Data\CityType $cityType = null,
        ?string $corpus = null,
        ?string $flat = null,
        ?string $fullAddress = null
    ) {
        $this->createdAt = $createdAt;
        $this->language = $language;
        $this->type = $type;
        $this->country = $country;
        $this->index = $index;
        $this->state = $state;
        $this->area = $area;
        $this->city = $city;
        $this->cityType = $cityType;
        $this->street = $street;
        $this->house = $house;
        $this->corpus = $corpus;
        $this->flat = $flat;
        $this->fullAddress = $fullAddress;
    }

    public function getCreatedAt(): \DateTimeInterface
    {
        return $this->createdAt;
    }

    public function getLanguage(): Ubki\Data\Language
    {
        return $this->language;
    }

    public function getType(): Type
    {
        return $this->type;
    }

    public function getCountry(): string
    {
        return $this->country;
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

    public function getCity(): string
    {
        return $this->city;
    }

    public function getCityType(): ?Ubki\Data\CityType
    {
        return $this->cityType;
    }

    public function getStreet(): string
    {
        return $this->street;
    }

    public function getHouse(): string
    {
        return $this->house;
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

    public function jsonSerialize(): array
    {
        return [
            'createdAt' => Carbon::instance($this->getCreatedAt())->toDateString(),
            'language' => (string)$this->getLanguage(),
            'type' => (string)$this->getType(),
            'country' => $this->getCountry(),
            'city' => $this->getCity(),
            'street' => $this->getStreet(),
            'house' => $this->getHouse(),
            'index' => $this->getIndex(),
            'state' => $this->getState(),
            'area' => $this->getArea(),
            'cityType' => (string)$this->getCityType(),
            'corpus' => $this->getCorpus(),
            'flat' => $this->getFlat(),
            'fullAddress' => $this->getFullAddress()
        ];
    }
}
