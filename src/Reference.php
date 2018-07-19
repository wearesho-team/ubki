<?php

namespace Wearesho\Bobra\Ubki;

use MyCLabs\Enum\Enum;

/**
 * Class Reference
 * @package Wearesho\Bobra\Ubki
 */
abstract class Reference extends Enum
{
    /** @var string|null */
    protected $description;

    public function __construct(int $value, string $description = null)
    {
        $this->description = $description;

        parent::__construct($value);
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

    public function getValue(): int
    {
        return parent::getValue();
    }
}
