<?php

namespace Wearesho\Bobra\Ubki\Tests\Push\Registry;

use Wearesho\Bobra\Ubki\Tests\TestCase;
use Wearesho\Bobra\Ubki\Push\Registry;

/**
 * Class UnsupportedRequestExceptionTest
 *
 * @package Wearesho\Bobra\Ubki\Tests\Push\Registry
 */
class UnsupportedRequestExceptionTest extends TestCase
{
    public function testGetRequest(): void
    {
        $request = new class implements Registry\RequestInterface
        {
            use Registry\RequestTrait;

            public function __construct()
            {
                $this->todo = 'SomeInvalidType';
            }
        };

        $exception = new Registry\UnsupportedRequestException($request);

        $this->assertEquals($request, $exception->getRequest());
    }
}
