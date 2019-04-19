<?php

declare(strict_types=1);

namespace Wearesho\Bobra\Ubki\Tests\Unit\Data;

use PHPUnit\Framework\TestCase;
use Wearesho\Bobra\Ubki\Data\Comment;

/**
 * Class CommentTest
 * @package Wearesho\Bobra\Ubki\Tests\Unit\Data
 */
class CommentTest extends TestCase
{
    protected const TEXT = 'comment';
    protected const ID = 'id';
    
    /** @var Comment */
    protected $comment;
    
    protected function setUp(): void
    {
        $this->comment = new Comment(
            static::TEXT,
            static::ID
        );
    }

    public function testTag(): void
    {
        $this->assertEquals('comment', $this->comment::tag());
    }

    public function testJsonSerialize(): void
    {
        $this->assertEquals(
            [
                'text' => static::TEXT,
                'id' => static::ID,
            ],
            $this->comment->jsonSerialize()
        );
    }

    public function testGetText(): void
    {
        $this->assertEquals(static::TEXT, $this->comment->getText());
    }

    public function testGetId(): void
    {
        $this->assertEquals(static::ID, $this->comment->getId());
    }
}
