<?php

namespace Wearesho\Bobra\Ubki\Tests\Push\Registry\Rep;

use Carbon\Carbon;

use PHPUnit\Framework\TestCase;

use Wearesho\Bobra\Ubki\Push\Registry;

/**
 * Class RequestTest
 *
 * @package Wearesho\Bobra\Ubki\Tests\Push\Registry\Rep
 */
class RequestTest extends TestCase
{
    public function testRequestGets(): void
    {
        Carbon::setTestNow(Carbon::now());

        $request = new Registry\Rep\Request(
            Carbon::getTestNow()->format('Ymd'),
            'qwerty'
        );

        $this->assertEquals(Registry\Type::REP, $request->getRegistryType());
        $this->assertEquals(Carbon::getTestNow()->format('Ymd'), $request->getOperationDate());
        $this->assertEquals('qwerty', $request->getUbkiId());
        $this->assertEmpty($request->getPartnerId());
    }

    public function testSetInvalidRequestType(): void
    {
        $this->expectException(Registry\InvalidRequestTypeException::class);
        $this->expectExceptionMessage("Request type have invalid value: SOME");

        new Registry\Request('SOME', Carbon::now());
    }

    public function testSetInvalidDateFormat(): void
    {
        $this->expectException(Registry\InvalidOperationDateFormatException::class);
        $this->expectExceptionMessage("Operation date have invalid format: 2018-09-09");

        Carbon::setToStringFormat('Y-m-d');

        new Registry\Request(Registry\Type::REP, Carbon::createFromFormat('Y-m-d', '2018-09-09'));
    }
}
