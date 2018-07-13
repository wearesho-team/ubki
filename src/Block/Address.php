<?php

namespace Wearesho\Bobra\Ubki\Block;

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
     * vdate attribute (required)
     * @var \DateTimeInterface
     */
    protected $createdAt;

    /**
     * Language of this block
     * lng attribute
     * @var int
     */
    protected $language;

    /**
     * Type of this address
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
     * @var string
     */
    protected $index;

    /**
     * adstate attribute
     * @var string
     */
    protected $state;

    /**
     * adarea attribute
     * @var string
     */
    protected $area;

    /**
     * adcity attribute
     * @var string
     */
    protected $city;

    /**
     * adcitytype attribute
     * @var int
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
     * @var string
     */
    protected $corpus;

    /**
     * adflat attribute
     * @var string
     */
    protected $flat;

    /**
     * addrdirt attribute
     * @var string
     */
    protected $fullAddress;

    /**
     * Address constructor.
     *
     * @param \DateTimeInterface $createdAt
     * @param int                $language
     * @param int                $type
     * @param string             $country
     * @param string             $index
     * @param string             $state
     * @param string             $area
     * @param string             $city
     * @param int                $cityType
     * @param string             $street
     * @param string             $house
     * @param string             $corpus
     * @param string             $flat
     * @param string             $fullAddress
     */
    public function __construct(
        \DateTimeInterface $createdAt,
        int $language,
        int $type,
        string $country,
        string $index,
        string $state,
        string $area,
        string $city,
        int $cityType,
        string $street,
        string $house,
        string $corpus,
        string $flat,
        string $fullAddress
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

    public function getLanguage(): int
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

    public function getIndex(): string
    {
        return $this->index;
    }

    public function getState(): string
    {
        return $this->state;
    }

    public function getArea(): string
    {
        return $this->area;
    }

    public function getCity(): string
    {
        return $this->city;
    }

    public function getCityType(): int
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

    public function getCorpus(): string
    {
        return $this->corpus;
    }

    public function getFlat(): string
    {
        return $this->flat;
    }

    public function getFullAddress(): string
    {
        return $this->fullAddress;
    }
}
