<?php

declare(strict_types=1);

namespace Wearesho\Bobra\Ubki\Data;

use Carbon\Carbon;
use Wearesho\Bobra\Ubki;

/**
 * Class Address
 * @package Wearesho\Bobra\Ubki\Data
 *
 * @method static Address make(...$arguments)
 */
class Address implements Ubki\Contract\Data\Address, \JsonSerializable
{
    use Makeable, Tagable;

    /** @var \DateTimeInterface */
    protected $createdAt;

    /** @var Ubki\Dictionary\Language */
    protected $language;

    /** @var Ubki\Dictionary\Address */
    protected $addressType;

    /** @var string */
    protected $country;

    /** @var string */
    protected $city;

    /** @var string */
    protected $street;

    /** @var string */
    protected $house;

    /** @var string|\null */
    protected $index;

    /** @var string|\null */
    protected $state;

    /** @var string|\null */
    protected $area;

    /** @var Ubki\Dictionary\City */
    protected $cityType;

    /** @var string|\null */
    protected $corpus;

    /** @var string|\null */
    protected $flat;

    /** @var string|\null */
    protected $fullAddress;

    public function __construct(
        \DateTimeInterface $createdAt,
        Ubki\Dictionary\Language $language,
        Ubki\Dictionary\Address $addressType,
        string $country,
        string $city,
        string $street,
        string $house,
        string $index = \null,
        string $state = \null,
        string $area = \null,
        Ubki\Dictionary\City $cityType = \null,
        string $corpus = \null,
        string $flat = \null,
        string $fullAddress = \null
    ) {
        Ubki\Validator::COUNTRY()->validate($country);
        Ubki\Validator::INDEX()->validate($index, \true);
        Ubki\Validator::ADDRESS_STATE()->validate($state, \true);
        Ubki\Validator::ADDRESS_AREA()->validate($area, \true);
        Ubki\Validator::CITY()->validate($city);
        Ubki\Validator::STREET()->validate($street);
        Ubki\Validator::COUNTRY()->validate($house);
        Ubki\Validator::TEXT_40()->validate($flat, \true);
        Ubki\Validator::FULL_ADDRESS()->validate($fullAddress, \true);

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
            'createdAt' => Carbon::make($this->createdAt),
            'language' => $this->language,
            'addressType' => $this->addressType,
            'country' => $this->country,
            'city' => $this->city,
            'street' => $this->street,
            'house' => $this->house,
            'index' => $this->index,
            'state' => $this->state,
            'area' => $this->area,
            'cityType' => $this->cityType,
            'corpus' => $this->corpus,
            'flat' => $this->flat,
            'fullAddress' => $this->fullAddress,
        ];
    }

    public static function tag(): string
    {
        return 'addr';
    }

    public function getCreatedAt(): \DateTimeInterface
    {
        return $this->createdAt;
    }

    public function getLanguage(): Ubki\Dictionary\Language
    {
        return $this->language;
    }

    public function getAddressType(): Ubki\Dictionary\Address
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

    public function getCityType(): ?Ubki\Dictionary\City
    {
        return $this->cityType;
    }
}
