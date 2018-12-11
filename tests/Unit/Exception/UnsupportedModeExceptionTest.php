<?php

namespace Wearesho\Bobra\Ubki\Tests\Unit\Exception;

use PHPUnit\Framework\TestCase;
use Wearesho\Bobra\Ubki\Exception\UnsupportedMode;

/**
 * Class UnsupportedModeExceptionTest
 * @package Wearesho\Bobra\Ubki\Tests\Unit\Exception
 * @coversDefaultClass \Wearesho\Bobra\Ubki\Exception\UnsupportedMode
 * @internal
 */
class UnsupportedModeExceptionTest extends TestCase
{
    protected const MODE = 10;

    /** @var UnsupportedMode */
    protected $fakeUnsupportedModeException;

    protected function setUp(): void
    {
        $this->fakeUnsupportedModeException = new UnsupportedMode(static::MODE);
    }

    public function testModeAttribute(): void
    {
        $this->assertEquals(static::MODE, $this->fakeUnsupportedModeException->mode);
    }
}
