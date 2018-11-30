<?php

namespace Wearesho\Bobra\Ubki\Tests\Data\Elements;

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
                Comment::ID => static::ID,
                Comment::TEXT => static::TEXT,
            ],
            $this->fakeComment->jsonSerialize()
        );
    }

    public function testTag(): void
    {
        $this->assertEquals(
            Comment::TAG,
            $this->fakeComment->tag()
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
