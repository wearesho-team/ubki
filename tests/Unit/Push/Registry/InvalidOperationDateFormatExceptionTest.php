<?php

namespace Wearesho\Bobra\Ubki\Tests\Push\Registry;

use Carbon\Carbon;
use PHPUnit\Framework\TestCase;
use Wearesho\Bobra\Ubki\Push\Registry\InvalidOperationDateFormatException;

/**
 * Class InvalidOperationDateFormatExceptionTest
 * @package Wearesho\Bobra\Ubki\Tests\Push\Registry
 * @coversDefaultClass \Wearesho\Bobra\Ubki\Push\Registry\InvalidResponseXmlFormatException
 * @internal
 */
class InvalidOperationDateFormatExceptionTest extends TestCase
{
    public function testGetDate(): void
    {
        $date = new Carbon('2018-09-09');
        $exception = new InvalidOperationDateFormatException($date);
        $this->assertEquals($date, $exception->getDate());
    }
}
