<?php

namespace Wearesho\Bobra\Ubki\Tests\Validation;

use PHPUnit\Framework\TestCase;

use Wearesho\Bobra\Ubki\Validation\ValidationException;

/**
 * Class ValidationExceptionTest
 * @package Wearesho\Bobra\Ubki\Tests\Validation
 * @coversDefaultClass ValidationException
 * @internal
 */
class ValidationExceptionTest extends TestCase
{
    protected const VALUE = 'value';

    /** @var ValidationException */
    protected $fakeValidationException;

    protected function setUp(): void
    {
        $this->fakeValidationException = new ValidationException(static::VALUE);
    }

    public function testGetValue(): void
    {
        $this->assertEquals(
            static::VALUE,
            $this->fakeValidationException->getValue()
        );
    }
}
