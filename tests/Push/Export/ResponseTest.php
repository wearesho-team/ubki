<?php

namespace Wearesho\Bobra\Ubki\Tests\Push\Export;

use Wearesho\Bobra\Ubki\Tests\TestCase;

use Wearesho\Bobra\Ubki\Push\Export;

/**
 * Class ResponseTest
 * @package Wearesho\Bobra\Ubki\Tests\Push\Export
 * @coversDefaultClass Export\Response
 * @internal
 */
class ResponseTest extends TestCase
{
    protected const NAME = 'testName';
    protected const START = 'testStart';
    protected const END = 'testEnd';
    protected const UBKI_ID = 'testUbkiId';
    protected const STATUS = 'testStatus';
    protected const INTERNAL_ERROR = 'testInternalError';
    protected const INTERNAL_MESSAGE = 'testInternalMessage';
    protected const BLOCK_ID = 2;
    protected const ERRORED_TAG = 'testErroredTag';
    protected const ATTRIBUTE = 'testAttribute';
    protected const TYPE = 'testType';
    protected const MESSAGE = 'testMessage';
    protected const PASSED_STRINGS = 10;
    protected const ERROR_STRINGS = 12;

    /** @var Export\Response */
    protected $fakeResponse;

    protected function setUp(): void
    {
        $this->fakeResponse = new Export\Response(
            static::UBKI_ID,
            static::STATUS,
            static::INTERNAL_ERROR,
            static::INTERNAL_MESSAGE,
            new Export\ErrorCollection([
                new Export\Error(
                    static::BLOCK_ID,
                    static::ERRORED_TAG,
                    static::ATTRIBUTE,
                    static::TYPE,
                    static::MESSAGE,
                    static::PASSED_STRINGS,
                    static::ERROR_STRINGS
                ),
            ])
        );
    }

    public function testGetUbkiId(): void
    {
        $this->assertEquals(
            static::UBKI_ID,
            $this->fakeResponse->getUbkiId()
        );
    }

    public function testGetErrors(): void
    {
        $this->assertEquals(
            new Export\ErrorCollection([
                new Export\Error(
                    static::BLOCK_ID,
                    static::ERRORED_TAG,
                    static::ATTRIBUTE,
                    static::TYPE,
                    static::MESSAGE,
                    static::PASSED_STRINGS,
                    static::ERROR_STRINGS
                ),
            ]),
            $this->fakeResponse->getErrors()
        );
    }

    public function testGetStatus(): void
    {
        $this->assertEquals(
            static::STATUS,
            $this->fakeResponse->getStatus()
        );
    }

    public function testGetInternalError(): void
    {
        $this->assertEquals(
            static::INTERNAL_ERROR,
            $this->fakeResponse->getInternalError()
        );
    }

    public function testGetInternalMessage(): void
    {
        $this->assertEquals(
            static::INTERNAL_MESSAGE,
            $this->fakeResponse->getInternalMessage()
        );
    }
}
