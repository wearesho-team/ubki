<?php

namespace Wearesho\Bobra\Ubki\Tests\Fakers;

use Carbon\Carbon;
use Wearesho\Bobra\Ubki;

/**
 * Class ElementFaker
 * @package Wearesho\Bobra\Ubki\Tests\Fakers
 *
 * @property-read Ubki\Data\Elements\Address $address
 * @property-read Ubki\Data\Elements\Comment $comment
 */
class ElementFaker
{
    /** @var bool */
    private $unique;

    /** @var array */
    private static $cache;

    protected function __construct(bool $unique = false)
    {
        $this->unique = $unique;
    }

    public static function elements(): array
    {
        return [
            'address' => [
                Ubki\Data\Elements\Address::class,
                [
                    Carbon::create(mt_rand(1960, 2018), mt_rand(1, 12), mt_rand(1, 28)),
                    DictionaryFaker::language(),
                    DictionaryFaker::addressType(),
                    'Country',
                    'City',
                    'Street',
                    'House',
                    'Index',
                    'State',
                    'Area',
                    DictionaryFaker::cityType(),
                    'Corpus',
                    'Flat',
                    'Full Address'
                ]
            ],
            'comment' => [
                Ubki\Data\Elements\Comment::class,
                [

                ]
            ]
        ];
    }

    public static function instance(): ElementFaker
    {
        return new static();
    }

    public function unique(): ElementFaker
    {
        return new static(true);
    }

    public function __get($name): Ubki\Infrastructure\ElementInterface
    {
        $element = static::elements()[$name];
        $class = array_shift($element);

        if ($this->unique) {
            if (empty(static::$cache[$class])) {
                static::$cache[$class] = static::instance()->$name;
            }

            return static::$cache[$class];
        }

        return new $class(...array_shift($element));
    }
}
