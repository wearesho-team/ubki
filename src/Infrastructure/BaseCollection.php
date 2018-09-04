<?php

namespace Wearesho\Bobra\Ubki\Infrastructure;

/**
 * Class BaseCollection
 * @package Wearesho\Bobra\Ubki\Infrastructure
 */
abstract class BaseCollection extends \ArrayObject implements \JsonSerializable
{
    public function __construct(array $elements = [], int $flags = 0, string $iteratorClass = \ArrayIterator::class)
    {
        foreach ($elements as $element) {
            $this->instanceOfType($element);
        }

        parent::__construct($elements, $flags, $iteratorClass);
    }

    /**
     * @param mixed $value
     */
    public function append($value): void
    {
        $this->instanceOfType($value);

        parent::append($value);
    }

    /**
     * @param mixed $index
     * @param mixed $value
     */
    public function offsetSet($index, $value): void
    {
        $this->instanceOfType($value);

        parent::offsetSet($index, $value);
    }

    public function jsonSerialize(): array
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
            throw new \InvalidArgumentException("Element {$objectType} must be instance of " . $needType);
        }
    }
}
