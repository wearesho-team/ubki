<?php

namespace Wearesho\Bobra\Ubki\Infrastructure;

use MyCLabs\Enum\Enum;

/**
 * Class Dictionary
 * @package Wearesho\Bobra\Ubki\Infrastructure
 */
abstract class Dictionary extends Enum
{
    /** @var string|int */
    protected $value;

    /** @var string|null */
    protected $description;

    public function __construct($value, string $description = null)
    {
        $this->description = $description;

        parent::__construct($value);
    }

    final public function __toString(): string
    {
        return (string)($this->description ?? $this->getKey());
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public static function __callStatic($name, $arguments)
    {
        $array = static::toArray();
        if (isset($array[$name])) {
            return new static($array[$name], $arguments ? array_shift($arguments) : null);
        }

        throw new \BadMethodCallException("No static method or enum constant '$name' in class " . get_called_class());
    }
}
