<?php

namespace Wearesho\Bobra\Ubki\Blocks\Collections;

use Wearesho\Bobra\Ubki\BaseCollection;
use Wearesho\Bobra\Ubki\Blocks\Entities\Comment;

/**
 * Class Comments
 * @package Wearesho\Bobra\Ubki\Blocks\Collections
 */
class Comments extends BaseCollection
{
    public function type(): string
    {
        return Comment::class;
    }
}
