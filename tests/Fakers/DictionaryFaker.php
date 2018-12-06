<?php

namespace Wearesho\Bobra\Ubki\Tests\Fakers;

use Wearesho\Bobra\Ubki\Dictionaries;

/**
 * Class DictionaryFaker
 * @package Wearesho\Bobra\Ubki\Tests\Fakers
 *
 * @property-read Dictionaries\AddressType $addressType
 * @property-read Dictionaries\Language $language
 * @property-read Dictionaries\CityType $cityType
 * @property-read Dictionaries\DocumentType $documentType
 * @property-read Dictionaries\RequestReason $requestReason
 * @property-read Dictionaries\RequestType $requestType
 */
class DictionaryFaker
{
    public const DESCRIPTION = 'test';

    protected static $dictionaries = [
        'addressType' => Dictionaries\AddressType::class,
        'language' => Dictionaries\Language::class,
        'cityType' => Dictionaries\CityType::class,
        'documentType' => Dictionaries\DocumentType::class,
        'requestReason' => Dictionaries\RequestReason::class,
        'requestType' => Dictionaries\RequestType::class,
    ];

    public function __get($name)
    {
        $keys = static::$dictionaries[$name]::keys();

        return static::$dictionaries[$name]::{$keys[\mt_rand(0, \count($keys) - 1)]}(static::DESCRIPTION);
    }
}
