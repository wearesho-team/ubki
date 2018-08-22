<?php

namespace Wearesho\Bobra\Ubki\Tests\Push;

use PHPUnit\Framework\TestCase;

use Wearesho\Bobra\Ubki\Push\Error;
use Wearesho\Bobra\Ubki\Block;

/**
 * Class ErrorTest
 * @package Wearesho\Bobra\Ubki\Tests\Push
 * @coversDefaultClass Error
 * @internal
 */
class ErrorTest extends TestCase
{
    protected const TAG = 'ADDR';
    protected const ATTRIBUTE = 'lng';
    protected const TYPE = 'CRITICAL';
    protected const MESSAGE = 'message';
    protected const PASSED_STRINGS = 10;
    protected const ERROR_STRINGS = 10;

    /** @var Error */
    protected $fakeError;

    protected function setUp(): void
    {
        $this->fakeError = new Error(
            Block\Identifying::ID,
            static::TAG,
            static::ATTRIBUTE,
            static::TYPE,
            static::MESSAGE,
            static::PASSED_STRINGS,
            static::ERROR_STRINGS
        );
    }

    public function testGetBlockId(): void
    {
        $this->assertEquals(
            Block\Identifying::ID,
            $this->fakeError->getBlockId()
        );
    }

    public function testGetErrorStringsCount(): void
    {
        $this->assertEquals(
            static::ERROR_STRINGS,
            $this->fakeError->getErrorStringsCount()
        );
    }

    public function testGetType(): void
    {
        $this->assertEquals(
            static::TYPE,
            $this->fakeError->getType()
        );
    }

    public function testGetPassedStringsCount(): void
    {
        $this->assertEquals(
            static::PASSED_STRINGS,
            $this->fakeError->getPassedStringsCount()
        );
    }

    public function testJsonSerialize(): void
    {
        $this->assertArraySubset(
            [
                'blockId' => Block\Identifying::ID,
                'tag' => static::TAG,
                'attribute' => static::ATTRIBUTE,
                'type' => static::TYPE,
                'message' => static::MESSAGE,
                'passedStrings' => static::PASSED_STRINGS,
                'errorString' => static::ERROR_STRINGS
            ],
            $this->fakeError->jsonSerialize()
        );
    }

    public function testGetTag(): void
    {
        $this->assertEquals(
            static::TAG,
            $this->fakeError->getTag()
        );
    }

    public function testGetAttribute(): void
    {
        $this->assertEquals(
            static::ATTRIBUTE,
            $this->fakeError->getAttribute()
        );
    }

    public function testGetMessage(): void
    {
        $this->assertEquals(
            static::MESSAGE,
            $this->fakeError->getMessage()
        );
    }
}
