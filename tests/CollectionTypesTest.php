<?php

namespace Wearesho\Bobra\Ubki\Tests;

use PHPUnit\Framework\TestCase;

use Wearesho\Bobra\Ubki;

/**
 * Class CollectionTypesTest
 * @internal
 * @package Wearesho\Bobra\Ubki\Tests
 */
class CollectionTypesTest extends TestCase
{
    /** @var array */
    protected $collections;

    protected function setUp()
    {
        $this->collections = [
            Ubki\Element\Contact::class => new Ubki\Collection\Contact(),
        ];
    }

    public function testType(): void
    {
        /**
         * @var string $type
         * @var Ubki\BaseCollection $collection
         */
        foreach ($this->collections as $type => $collection) {
            $this->assertEquals($type, $collection->type());
        }
    }
}
