<?php

namespace Wearesho\Bobra\Ubki\Tests\Push\Registry;

use PHPUnit\Framework\TestCase;

use Wearesho\Bobra\Ubki\Push\Registry;

/**
 * Class InvalidRequestTypeExceptionTest
 *
 * @package Wearesho\Bobra\Ubki\Tests\Push\Registry
 */
class InvalidRequestTypeExceptionTest extends TestCase
{
    public function testGetType(): void
    {
        $exception = new Registry\InvalidRequestTypeException('SOME');
        $this->assertEquals('SOME', $exception->getType());
    }
}
