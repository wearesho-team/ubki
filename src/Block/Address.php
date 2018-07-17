<?php

namespace Wearesho\Bobra\Ubki\Block;

use Wearesho\Bobra\Ubki\Type;

/**
 * Class Address
 * <addr> tag
 * @package Wearesho\Bobra\Ubki\Block
 */
class Address
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

    /**
     * Created date of this contact
     * vdate attribute
     * @var \DateTimeInterface
     */
    protected $createdAt;

    /**
     * Block representation language
     * lng attribute
     * @var Type\Language
     */
    protected $language;

    /**
     * adtype attribute
     * @var int
     */
    protected $type;

    /**
     * adcountry attribute
     * @var string
     */
    protected $country;

    /**
     * adindex attribute
     * @var string|null
     */
    protected $index;

    /**
     * adstate attribute
     * @var string|null
     */
    protected $state;

    /**
     * adarea attribute
     * @var string|null
     */
    protected $area;

    /**
     * adcity attribute
     * @var string
     */
    protected $city;

    /**
     * adcitytype attribute
     * @var int|null
     */
    protected $cityType;

    /**
     * adstreet attribute
     * @var string
     */
    protected $street;

    /**
     * adhome attribute
     * @var string
     */
    protected $house;

    /**
     * adcorp attribute
     * @var string|null
     */
    protected $corpus;

    /**
     * adflat attribute
     * @var string|null
     */
    protected $flat;

    /**
     * addrdirt attribute
     * @var string|null
     */
    protected $fullAddress;

    /**
     * Address constructor.
     *
     * @param \DateTimeInterface $createdAt
     * @param Type\Language      $language
     * @param int                $type
     * @param string             $country
     * @param string             $city
     * @param string             $street
     * @param string             $house
     * @param null|string        $index
     * @param null|string        $state
     * @param null|string        $area
     * @param int|null           $cityType
     * @param null|string        $corpus
     * @param null|string        $flat
     * @param null|string        $fullAddress
     */
    public function __construct(
        \DateTimeInterface $createdAt,
        Type\Language $language,
        int $type,
        string $country,
        string $city,
        string $street,
        string $house,
        ?string $index = null,
        ?string $state = null,
        ?string $area = null,
        ?int $cityType = null,
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

    public function getLanguage(): Type\Language
    {
        return $this->language;
    }

    public function getType(): int
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

    public function getCityType(): ?int
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
}
