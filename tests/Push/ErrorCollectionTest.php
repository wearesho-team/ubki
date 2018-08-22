<?php

namespace Wearesho\Bobra\Ubki\Tests\Push;

use PHPUnit\Framework\TestCase;

use Wearesho\Bobra\Ubki\Push;

/**
 * Class ErrorCollectionTest
 * @package Wearesho\Bobra\Ubki\Tests\Push
 * @coversDefaultClass Push\ErrorCollection
 * @internal
 */
class ErrorCollectionTest extends TestCase
{
    protected const TYPE = Push\Error::class;

    /** @var Push\ErrorCollection */
    protected $fakeErrorCollection;

    protected function setUp(): void
    {
        $this->fakeErrorCollection = new Push\ErrorCollection();
    }

    public function testType(): void
    {
        $this->assertEquals(
            static::TYPE,
            $this->fakeErrorCollection->type()
        );
    }
}
