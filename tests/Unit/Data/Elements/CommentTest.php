<?php

namespace Wearesho\Bobra\Ubki\Tests\Unit\Data\Elements;

use Wearesho\Bobra\Ubki;

/**
 * Class CommentTest
 * @package Wearesho\Bobra\Ubki\Tests\Unit\Data\Elements
 * @coversDefaultClass \Wearesho\Bobra\Ubki\Data\Elements\Comment
 * @internal
 */
class CommentTest extends TestCase
{
    use ArgumentsTrait\Comment;

    protected const ELEMENT = Ubki\Data\Elements\Comment::class;

    public const TEXT = 'testText';
    public const ID = 'testId';

    protected function getExpectTag(): string
    {
        return Ubki\Data\Elements\Comment::TAG;
    }

    protected function jsonKeys(): array
    {
        return [
            Ubki\Data\Elements\Comment::TEXT,
            Ubki\Data\Elements\Comment::ID,
        ];
    }

    protected function attributesNames(): array
    {
        return [
            'text',
            'id'
        ];
    }
}
