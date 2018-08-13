<?php

namespace Wearesho\Bobra\Ubki;

/**
 * Class Element
 * @package Wearesho\Bobra\Ubki
 */
abstract class Element
{
    public const PARENT_TAG = null;
    public const TAG = null;

    /** @var array */
    private $properties;

    public function __construct(array $properties)
    {
        $this->properties = $properties;
    }

    final public function tag(): string
    {
        return static::TAG;
    }

    /**
     * @param string $key
     *
     * @return mixed
     * @throws \InvalidArgumentException
     */
    public function __get($key)
    {
        if (array_key_exists($key, $this->properties)) {
            return $this->properties[$key];
        }

        throw new \InvalidArgumentException('Property with this name does not exist!');
    }

    public function __set($key, $value)
    {
        if (array_key_exists($key, $this->properties)) {
            throw new \InvalidArgumentException('Property is in only-read mode');
        }

        throw new \InvalidArgumentException('This entity is dynamically unchangeable');
    }
}
