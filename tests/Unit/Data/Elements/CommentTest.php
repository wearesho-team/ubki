<?php

namespace Wearesho\Bobra\Ubki\Tests\Unit\Data\Elements;

use Wearesho\Bobra\Ubki;

/**
 * Class CommentTest
 * @package Wearesho\Bobra\Ubki\Tests\Unit\Data\Elements
 * @coversDefaultClass \Wearesho\Bobra\Ubki\Data\Elements\Comment
 * @internal
 */
class CommentTest extends Ubki\Tests\Unit\Data\TestCase
{
    use ArgumentsTrait\Comment;

    protected const ELEMENT = Ubki\Data\Elements\Comment::class;

    public const TEXT = 'testText';
    public const ID = 'testId';

    protected function getExpectTag(): string
    {
        return Ubki\Data\Elements\Comment::TAG;
    }

    protected function attributesNames(): array
    {
        return [
            'text',
            'id'
        ];
    }
}
