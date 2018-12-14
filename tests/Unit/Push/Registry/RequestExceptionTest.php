<?php

namespace Wearesho\Bobra\Ubki\Tests\Push\Registry;

use PHPUnit\Framework\TestCase;
use Wearesho\Bobra\Ubki\Push\Registry\RequestException;

/**
 * Class RequestTest
 * @package Wearesho\Bobra\Ubki\Tests\Push\Registry
 * @coversDefaultClass \Wearesho\Bobra\Ubki\Push\Registry\RequestException
 * @internal
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

        /** @noinspection PhpUnhandledExceptionInspection */
        throw new RequestException($errors);
    }
}
