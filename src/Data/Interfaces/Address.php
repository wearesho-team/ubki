<?php

namespace Wearesho\Bobra\Ubki\Data\Interfaces;

use Wearesho\Bobra\Ubki;

/**
 * Interface Address
 * @package Wearesho\Bobra\Ubki\Data\Interfaces
 */
interface Address extends Ubki\Infrastructure\ElementInterface
{
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
    public const FLAT = 'adflat';
    public const FULL_ADDRESS = 'addrdirt';

    public function getCreatedAt(): \DateTimeInterface;

    public function getLanguage(): Ubki\Dictionary\Language;

    public function getAddressType(): Ubki\Dictionary\AddressType;

    public function getCountry(): string;

    public function getCity(): string;

    public function getStreet(): string;

    public function getHouse(): string;

    public function getIndex(): ?string;

    public function getState(): ?string;

    public function getArea(): ?string;

    public function getCorpus(): ?string;

    public function getFlat(): ?string;

    public function getFullAddress(): ?string;

    public function getCityType(): ?Ubki\Dictionary\CityType;
}
