<?php

namespace Wearesho\Bobra\Ubki\Tests\Extend;

use PHPUnit\Framework\TestCase;

use Wearesho\Bobra\Ubki;

/**
 * Class CollectionTestCase
 * @package Wearesho\Bobra\Ubki\Tests\Extend
 */
abstract class CollectionTestCase extends TestCase
{
    protected const TYPE = null;

    /** @var Ubki\BaseCollection */
    protected $collection;

    public function testType(): void
    {
        $this->assertEquals(static::TYPE, is_null($this->collection) ? null : $this->collection->type());
    }
}
