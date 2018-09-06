<?php

namespace Wearesho\Bobra\Ubki\Tests\Pull\Elements;

use PHPUnit\Framework\TestCase;

use Wearesho\Bobra\Ubki\Pull\Elements\Document;
use Wearesho\Bobra\Ubki\References\DocumentType;

/**
 * Class DocumentTest
 * @package Wearesho\Bobra\Ubki\Tests\Pull\Elements
 * @coversDefaultClass Document
 * @internal
 */
class DocumentTest extends TestCase
{
    protected const SERIAL = 'testSerial';
    protected const NUMBER = 'testNumber';

    /** @var Document */
    protected $fakeDocument;

    protected function setUp(): void
    {
        $this->fakeDocument = new Document(
            DocumentType::PASSPORT(),
            static::SERIAL,
            static::NUMBER
        );
    }

    public function testJsonSerialize(): void
    {
        $this->assertArraySubset(
            [
                Document::TYPE => DocumentType::PASSPORT()->getValue(),
                Document::SERIAL => static::SERIAL,
                Document::NUMBER => static::NUMBER,
            ],
            $this->fakeDocument->jsonSerialize()
        );
    }

    public function testGetNumber(): void
    {
        $this->assertEquals(
            static::NUMBER,
            $this->fakeDocument->getNumber()
        );
    }

    public function testGetType(): void
    {
        $this->assertEquals(
            DocumentType::PASSPORT(),
            $this->fakeDocument->getType()
        );
    }

    public function testGetSerial(): void
    {
        $this->assertEquals(
            static::SERIAL,
            $this->fakeDocument->getSerial()
        );
    }
}
