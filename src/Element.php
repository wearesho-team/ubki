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
        $properties = get_object_vars($this);

        if (array_key_exists($key, $properties)) {
            return $this->{$key};
        }

        throw new \InvalidArgumentException('Property with this name does not exist!');
    }
}
