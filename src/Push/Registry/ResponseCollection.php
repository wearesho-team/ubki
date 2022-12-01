<?php

namespace Wearesho\Bobra\Ubki\Push\Registry;

use Carbon\Carbon;
use Wearesho\Bobra\Ubki\Push\Registry;

/**
 * Class ResponseCollection
 * @package Wearesho\Bobra\Ubki\Push\Registry
 *
 * @method Registry\Rep\Response offsetGet($index)
 */
class ResponseCollection extends \ArrayObject implements \JsonSerializable
{
    public function __construct(
        array $input = [],
        int $flags = 0,
        string $iteratorClass = \ArrayIterator::class
    ) {
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
    protected function checkItem($value): void
    {
        if (!$value instanceof ResponseInterface) {
            throw new \InvalidArgumentException(
                'All items have to be instance of ' . ResponseInterface::class
            );
        }
    }
}
