<?php

namespace Wearesho\Bobra\Ubki;

/**
 * Class BaseCollection
 * @package Wearesho\Bobra\Ubki
 */
abstract class BaseCollection extends \ArrayObject implements \JsonSerializable
{
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

    abstract public function type(): string;

    /**
     * @param mixed $object
     */
    protected function instanceOfType($object): void
    {
        $needType = $this->type();
        $objectType = get_class($object);

        if (!$object instanceof $needType) {
            throw new \InvalidArgumentException("Element {$objectType} must be compatible with " . $needType);
        }
    }
}
