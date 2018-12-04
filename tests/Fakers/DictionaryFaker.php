<?php

namespace Wearesho\Bobra\Ubki\Tests\Fakers;

use Wearesho\Bobra\Ubki\Dictionaries;

/**
 * Class DictionaryFaker
 * @package Wearesho\Bobra\Ubki\Tests\Fakers
 *
 * @method static Dictionaries\AddressType addressType()
 * @method static Dictionaries\Language language()
 * @method static Dictionaries\CityType cityType()
 *
 * @property-read Dictionaries\AddressType $addressType
 * @property-read Dictionaries\Language $language
 * @property-read Dictionaries\CityType $cityType
 */
class DictionaryFaker
{
    public const DESCRIPTION = 'test';

    protected static $dictionaries = [
        'addressType' => Dictionaries\AddressType::class,
        'language' => Dictionaries\Language::class,
        'cityType' => Dictionaries\CityType::class,
    ];

    public static function __callStatic($name, $arguments)
    {
        return (new static)->$name;
    }

    public function __get($name)
    {
        $keys = static::$dictionaries[$name]::keys();

        return static::$dictionaries[$name]::{$keys[mt_rand(0, count($keys) - 1)]}(static::DESCRIPTION);
    }
}
