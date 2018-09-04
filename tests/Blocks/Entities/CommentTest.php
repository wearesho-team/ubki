<?php

namespace Wearesho\Bobra\Ubki\Tests\Blocks\Entities;

use Wearesho\Bobra\Ubki\Data\Elements\Comment;

use PHPUnit\Framework\TestCase;

/**
 * Class CommentTest
 * @package Wearesho\Bobra\Ubki\Tests\Data\Elements
 * @coversDefaultClass Comment
 * @internal
 */
class CommentTest extends TestCase
{
    protected const TEXT = 'testText';
    protected const ID = 'testId';

    /** @var Comment */
    protected $fakeComment;

    protected function setUp(): void
    {
        $this->fakeComment = new Comment(
            static::TEXT,
            static::ID
        );
    }

    public function testJsonSerialize(): void
    {
        $this->assertArraySubset(
            [
                'id' => static::ID,
                'text' => static::TEXT,
            ],
            $this->fakeComment->jsonSerialize()
        );
    }

    public function testGetId(): void
    {
        $this->assertEquals(
            static::ID,
            $this->fakeComment->getId()
        );
    }

    public function testGetText(): void
    {
        $this->assertEquals(
            static::TEXT,
            $this->fakeComment->getText()
        );
    }
}
