<?php

namespace Wearesho\Bobra\Ubki\Tests\Push\Registry;

use Wearesho\Bobra\Ubki\Tests\TestCase;
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
        $errors = 'Some request errors';

        $this->expectException(RequestException::class);
        $this->expectExceptionMessage('Request errors: ' . $errors);

        $exception = new RequestException($errors);
        $this->assertEquals($errors, $exception->getErrors());

        throw new RequestException($errors);
    }
}
