<?php

namespace Wearesho\Bobra\Ubki\Tests\Unit;

use PHPUnit\Framework\TestCase;
use Wearesho\Bobra\Ubki\UnsupportedModeException;

/**
 * Class UnsupportedModeExceptionTest
 * @package Wearesho\Bobra\Ubki\Tests\Unit
 * @coversDefaultClass UnsupportedModeException
 * @internal
 */
class UnsupportedModeExceptionTest extends TestCase
{
    protected const MODE = 10;

    /** @var UnsupportedModeException */
    protected $fakeUnsupportedModeException;

    protected function setUp(): void
    {
        $this->fakeUnsupportedModeException = new UnsupportedModeException(static::MODE);
    }

    public function testModeAttribute(): void
    {
        $this->assertEquals(static::MODE, $this->fakeUnsupportedModeException->mode);
    }
}
