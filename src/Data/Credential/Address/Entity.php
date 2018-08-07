<?php

namespace Wearesho\Bobra\Ubki\Data\Credential\Address;

use Carbon\Carbon;

use Wearesho\Bobra\Ubki\Element;
use Wearesho\Bobra\Ubki\Data;

/**
 * Class Entity
 * @package Wearesho\Bobra\Ubki\Data\Credential\Address
 *
 * @property-read \DateTimeInterface $createdAt
 * @property-read Data\Language      $language
 * @property-read Type               $type
 * @property-read string             $country
 * @property-read string             $city
 * @property-read string             $street
 * @property-read string             $house
 * @property-read string|null        $index
 * @property-read string|null        $state
 * @property-read string|null        $area
 * @property-read null|string        $corpus
 * @property-read null|string        $flat
 * @property-read null|string        $fullAddress
 * @property-read Data\CityType|null $cityType
 */
class Entity extends Element implements \JsonSerializable
{
    public const TAG = 'addr';

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

    public function __construct(
        \DateTimeInterface $createdAt,
        Data\Language $language,
        Type $type,
        string $country,
        string $city,
        string $street,
        string $house,
        ?string $index = null,
        ?string $state = null,
        ?string $area = null,
        ?Data\CityType $cityType = null,
        ?string $corpus = null,
        ?string $flat = null,
        ?string $fullAddress = null
    ) {
        parent::__construct([
            'createdAt' => $createdAt,
            'language' => $language,
            'type' => $type,
            'country' => $country,
            'city' => $city,
            'street' => $street,
            'house' => $house,
            'index' => $index,
            'state' => $state,
            'area' => $area,
            'cityType' => $cityType,
            'corpus' => $corpus,
            'flat' => $flat,
            'fullAddress' => $fullAddress
        ]);
    }

    public function jsonSerialize(): array
    {
        return [
            'createdAt' => Carbon::instance($this->createdAt)->toDateString(),
            'language' => (string)$this->language,
            'type' => (string)$this->type,
            'country' => $this->country,
            'city' => $this->city,
            'street' => $this->street,
            'house' => $this->house,
            'index' => $this->index,
            'state' => $this->state,
            'area' => $this->area,
            'cityType' => (string)$this->cityType,
            'corpus' => $this->corpus,
            'flat' => $this->flat,
            'fullAddress' => $this->fullAddress
        ];
    }
}
