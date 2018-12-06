<?php

namespace Wearesho\Bobra\Ubki\Tests\Fakers;

use Wearesho\Bobra\Ubki;

/**
 * Class ElementFaker
 * @package Wearesho\Bobra\Ubki\Tests\Fakers
 */
class ElementFaker
{
    /** @var array */
    protected $injectData;

    protected function __construct(array $injectData = [])
    {
        $this->injectData = $injectData;
    }

    public function make(string $elementName): Ubki\Infrastructure\Element
    {
        return new $elementName(...$this->injectData);
    }

    public static function instance(): ElementFaker
    {
        return new static();
    }

    public function with(array $arguments): ElementFaker
    {
        return new static($arguments);
    }
}
