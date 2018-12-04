<?php

namespace Wearesho\Bobra\Ubki\Tests\Fakers;

use Carbon\Carbon;
use Wearesho\Bobra\Ubki;

/**
 * Class ElementFaker
 * @package Wearesho\Bobra\Ubki\Tests\Fakers
 */
class ElementFaker
{
    /** @var array */
    private $injectData;

    protected function __construct(array $injectData = [])
    {
        $this->injectData = $injectData;
    }

    public static function elements(): array
    {
        return [
            Ubki\Data\Elements\Address::class => [
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
                'Full Address',
            ],
            Ubki\Data\Elements\Comment::class => [
                'Text',
                'Id',
            ],
        ];
    }

    public static function instance(): ElementFaker
    {
        return new static();
    }

    public function with(array $arguments): ElementFaker
    {
        return new static($arguments);
    }

    public function __get($name): Ubki\Infrastructure\ElementInterface
    {
        return new $name(...($this->injectData ?: static::elements()[$name]));
    }
}
