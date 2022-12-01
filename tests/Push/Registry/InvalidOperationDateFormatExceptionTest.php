<?php

namespace Wearesho\Bobra\Ubki\Tests\Push\Registry;

use Carbon\Carbon;
use Wearesho\Bobra\Ubki\Tests\TestCase;
use Wearesho\Bobra\Ubki\Push\Registry\InvalidOperationDateFormatException;

/**
 * Class InvalidOperationDateFormatExceptionTest
 *
 * @package Wearesho\Bobra\Ubki\Tests\Push\Registry
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
