<?php

namespace Wearesho\Bobra\Ubki\Tests\Extend;

use Wearesho\Bobra\Ubki\Tests\TestCase;

use Wearesho\Bobra\Ubki;

/**
 * Class CollectionTestCase
 * @package Wearesho\Bobra\Ubki\Tests\Extend
 */
abstract class CollectionTestCase extends TestCase
{
    protected const TYPE = null;

    protected Ubki\Infrastructure\BaseCollection $collection;

    public function testType(): void
    {
        $this->assertEquals(static::TYPE, is_null($this->collection) ? null : $this->collection->type());
    }
}
