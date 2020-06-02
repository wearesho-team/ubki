<?php

namespace Wearesho\Bobra\Ubki\Tests\Push\Export;

use Wearesho\Bobra\Ubki\Push\Export\Error;

use Wearesho\Bobra\Ubki\Tests\TestCase;

/**
 * Class ErrorTest
 * @package Wearesho\Bobra\Ubki\Tests\Push\Export
 * @coversDefaultClass Error
 * @internal
 */
class ErrorTest extends TestCase
{
    protected const BLOCK_ID = 2;
    protected const ERRORED_TAG = 'testErroredTag';
    protected const ATTRIBUTE = 'testAttribute';
    protected const TYPE = 'testType';
    protected const MESSAGE = 'testMessage';
    protected const PASSED_STRINGS = 10;
    protected const ERROR_STRINGS = 12;

    /** @var Error */
    protected $fakeError;

    protected function setUp(): void
    {
        $this->fakeError = new Error(
            static::BLOCK_ID,
            static::ERRORED_TAG,
            static::ATTRIBUTE,
            static::TYPE,
            static::MESSAGE,
            static::PASSED_STRINGS,
            static::ERROR_STRINGS
        );
    }

    public function testJsonSerialize(): void
    {
        $this->assertArraySubset(
            [
                'blockId' => static::BLOCK_ID,
                'tag' => static::ERRORED_TAG,
                'attribute' => static::ATTRIBUTE,
                'type' => static::TYPE,
                'message' => static::MESSAGE,
                'passedStrings' => static::PASSED_STRINGS,
                'errorString' => static::ERROR_STRINGS
            ],
            $this->fakeError->jsonSerialize()
        );
    }

    public function testTag(): void
    {
        $this->assertEquals(
            Error::TAG,
            $this->fakeError->tag()
        );
    }

    public function testGetMessage(): void
    {
        $this->assertEquals(
            static::MESSAGE,
            $this->fakeError->getMessage()
        );
    }

    public function testGetPassedStringsCount(): void
    {
        $this->assertEquals(
            static::PASSED_STRINGS,
            $this->fakeError->getPassedStringsCount()
        );
    }

    public function testGetBlockId(): void
    {
        $this->assertEquals(
            static::BLOCK_ID,
            $this->fakeError->getBlockId()
        );
    }

    public function testGetErroredTag(): void
    {
        $this->assertEquals(
            static::ERRORED_TAG,
            $this->fakeError->getErroredTag()
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

    public function testGetAttribute(): void
    {
        $this->assertEquals(
            static::ATTRIBUTE,
            $this->fakeError->getAttribute()
        );
    }
}
