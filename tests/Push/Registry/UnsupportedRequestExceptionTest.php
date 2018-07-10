<?php

namespace Wearesho\Bobra\Ubki\Tests\Push\Registry;

use Carbon\Carbon;

use PHPUnit\Framework\TestCase;

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
        $request = new Registry\Request(
            Registry\Type::BIL,
            Carbon::now()->format('Ymd')
        );

        $exception = new Registry\UnsupportedRequestException($request);

        $this->assertEquals($request, $exception->getRequest());
    }
}
