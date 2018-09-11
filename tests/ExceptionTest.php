<?php

namespace Wearesho\Bobra\Ubki\Tests;

use Carbon\Carbon;
use Wearesho\Bobra\Ubki;

use PHPUnit\Framework\TestCase;

/**
 * Class ExceptionTest
 * @internal
 * @package Wearesho\Bobra\Ubki\Tests
 */
class ExceptionTest extends TestCase
{
    public function testGetPublicMessage(): void
    {
        $exception = new Ubki\Exception('message', 0, null, 'public-message');
        $this->assertEquals('public-message', $exception->getPublicMessage());
    }
}
