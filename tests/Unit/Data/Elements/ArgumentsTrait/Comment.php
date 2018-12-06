<?php

namespace Wearesho\Bobra\Ubki\Tests\Unit\Data\Elements\ArgumentsTrait;

use Wearesho\Bobra\Ubki\Tests\Unit\Data\Elements\CommentTest;

/**
 * Trait Comment
 * @package Wearesho\Bobra\Ubki\Tests\Unit\Data\Elements\ArgumentsTrait
 */
trait Comment
{
    protected function arguments(): array
    {
        return [
            CommentTest::TEXT,
            CommentTest::ID
        ];
    }
}
