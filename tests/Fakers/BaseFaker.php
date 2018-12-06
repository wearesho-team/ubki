<?php

namespace Wearesho\Bobra\Ubki\Tests\Fakers;

/**
 * Class BaseFaker
 * @package Wearesho\Bobra\Ubki\Tests\Fakers
 *
 * @property ElementCollectionFaker $collection
 * @property DictionaryFaker $dictionary
 * @property ElementFaker $element
 */
class BaseFaker
{
    protected static $fakers = [
        'collection',
        'dictionary',
        'element',
    ];

    public function setFaker(string $name, $faker)
    {
        static::$fakers[$name] = $faker;
    }

    public function __get($name)
    {
        return static::$fakers[$name];
    }
}
