<?php

namespace Wearesho\Bobra\Ubki\Tests\Push\Registry;

use Wearesho\Bobra\Ubki\Push\Registry\EmptyResponseDocException;
use PHPUnit\Framework\TestCase;

/**
 * Class EmptyResponseDocExceptionTest
 * @internal
 * @package Wearesho\Bobra\Ubki\Tests\Push\Registry
 */
class EmptyResponseDocExceptionTest extends TestCase
{
    /** @var EmptyResponseDocException */
    protected $exception;

    protected function setUp(): void
    {
        $this->exception = new EmptyResponseDocException(
            '<?xml version="1.0" encoding="UTF-8" standalone="yes"?><doc></doc>'
        );
    }

    public function testGetResponse(): void
    {
        $this->assertEquals(
            '<?xml version="1.0" encoding="UTF-8" standalone="yes"?><doc></doc>',
            $this->exception->getResponse()
        );
    }
}
