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
            Carbon::getTestNow(),
            'qwerty'
        );

        $this->assertEquals(Registry\Type::REP, $request->getRegistryType());
        $this->assertEquals(Carbon::getTestNow()->format('Ymd'), $request->getOperationDate()->format('Ymd'));
        $this->assertEquals('qwerty', $request->getUbkiId());
        $this->assertEmpty($request->getPartnerId());
    }
}
