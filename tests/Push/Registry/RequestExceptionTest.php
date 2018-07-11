<?php

namespace Wearesho\Bobra\Ubki\Tests\Push\Registry;

use PHPUnit\Framework\TestCase;

use Wearesho\Bobra\Ubki\Push\Registry\RequestException;

/**
 * Class RequestExceptionTest
 *
 * @package Wearesho\Bobra\Ubki\Tests\Push\Registry
 */
class RequestExceptionTest extends TestCase
{
    public function testGets(): void
    {
        $exception = new RequestException('Some request errors');
        $this->assertEquals('Some request errors', $exception->getRequest());
    }
}
