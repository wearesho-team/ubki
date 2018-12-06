<?php

namespace Wearesho\Bobra\Ubki\Tests\Fakers;

use function DeepCopy\deep_copy;
use Wearesho\BaseCollection;
use Wearesho\Bobra\Ubki;

/**
 * Class ElementCollectionFaker
 * @package Wearesho\Bobra\Ubki\Tests\Fakers
 */
class ElementCollectionFaker
{
    /** @var BaseCollection */
    protected $collection;

    public function __construct(BaseCollection $collection = null)
    {
        $this->collection = $collection;
    }

    public function type(string $collectionName): ElementCollectionFaker
    {
        return new static(new $collectionName([]));
    }

    public function fill(int $count, Ubki\Infrastructure\Element $element): ElementCollectionFaker
    {
        for ($i = 0; $i < $count; $i++) {
            $this->collection->append(deep_copy($element));
        }

        return $this;
    }

    public function get(): BaseCollection
    {
        return deep_copy($this->collection);
    }
}
