<?php

namespace Wearesho\Bobra\Ubki\Data\Collections;

use Wearesho\Bobra\Ubki\Infrastructure;
use Wearesho\Bobra\Ubki\Data\Elements\Comment;

/**
 * Class Comments
 * @package Wearesho\Bobra\Ubki\Data\Collections
 */
class Comments extends Infrastructure\BaseCollection
{
    public function type(): string
    {
        return Comment::class;
    }
}
