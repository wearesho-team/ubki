<?php

namespace Wearesho\Bobra\Ubki\Data\Collection;

use Wearesho\BaseCollection;
use Wearesho\Bobra\Ubki\Data\Element\Comment;

/**
 * Class Comments
 * @package Wearesho\Bobra\Ubki\Data\Collection
 */
class Comments extends BaseCollection
{
    public function type(): string
    {
        return Comment::class;
    }
}
