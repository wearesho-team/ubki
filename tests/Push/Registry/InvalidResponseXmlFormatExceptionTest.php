<?php

namespace Wearesho\Bobra\Ubki\Tests\Push\Registry;

use Wearesho\Bobra\Ubki\Tests\TestCase;
use Wearesho\Bobra\Ubki\Push\Registry\InvalidResponseXmlFormatException;

/**
 * Class InvalidResponseXmlFormatExceptionTest
 *
 * @package Wearesho\Bobra\Ubki\Tests\Push\Registry
 */
class InvalidResponseXmlFormatExceptionTest extends TestCase
{
    public function testGetResponseBody(): void
    {
        $response = 'Some invelid xml doc';
        $exception = new InvalidResponseXmlFormatException($response);
        $this->assertEquals($response, $exception->getResponse());
    }
}
