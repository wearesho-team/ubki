<?php

namespace Wearesho\Bobra\Ubki\Push\Registry;

/**
 * Class ResponseCollection
 *
 * @package Wearesho\Bobra\Ubki\Push\Registry
 */
class ResponseCollection extends \ArrayObject implements \JsonSerializable
{
    public function __construct($input = [], int $flags = 0, string $iteratorClass = "ArrayIterator")
    {
        foreach ($input as $item) {
            $this->checkItem($item);
        }

        parent::__construct($input, $flags, $iteratorClass);
    }

    /**
     * @param ResponseInterface $value
     */
    public function append($value)
    {
        $this->checkItem($value);
        parent::append($value);
    }

    /**
     * @param mixed             $index
     * @param ResponseInterface $newval
     */
    public function offsetSet($index, $newval)
    {
        $this->checkItem($newval);
        parent::offsetSet($index, $newval);
    }

    /**
     * @inheritdoc
     */
    public function jsonSerialize()
    {
        return (array)$this;
    }

    /**
     * @param mixed $value
     */
    public static function checkItem($value): void
    {
        if (!$value instanceof ResponseInterface) {
            throw new \InvalidArgumentException(
                'All items have to be instance of ' . ResponseInterface::class
            );
        }
    }
}
