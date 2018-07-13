<?php

namespace Wearesho\Bobra\Ubki;

/**
 * Class BaseCollection
 * @package Wearesho\Bobra\Ubki
 */
class BaseCollection extends \ArrayObject implements \JsonSerializable
{
    /**
     * Type of collection's element
     */
    public const ELEMENT_TYPE = null;

    /**
     * BaseCollection constructor.
     *
     * @param array  $elements
     * @param int    $flags
     * @param string $iteratorClass
     */
    public function __construct(
        array $elements = [],
        int $flags = 0,
        string $iteratorClass = \ArrayIterator::class
    ) {
        foreach ($elements as $element) {
            $this->instanceOfType($element);
        }

        parent::__construct($elements, $flags, $iteratorClass);
    }

    /**
     * @param mixed $value
     */
    public function append($value)
    {
        $this->instanceOfType($value);

        parent::append($value);
    }

    /**
     * @param mixed $index
     * @param mixed $value
     */
    public function offsetSet($index, $value)
    {
        $this->instanceOfType($value);

        parent::offsetSet($index, $value);
    }

    public function jsonSerialize()
    {
        return (array)$this;
    }

    /**
     * @param mixed $object
     */
    protected function instanceOfType($object): void
    {
        $needType = static::ELEMENT_TYPE;
        $objectType = get_class($object);

        if (!$object instanceof $needType) {
            throw new \InvalidArgumentException("Элемент {$objectType} должен быть совместим с " . $needType);
        }
    }
}
