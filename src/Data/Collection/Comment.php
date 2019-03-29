<?php

namespace Wearesho\Bobra\Ubki\Data\Collection;

use Wearesho\BaseCollection;
use Wearesho\Bobra\Ubki\Data;

/**
 * Class Comment
 * @package Wearesho\Bobra\Ubki\Data\Collection
 */
class Comment extends BaseCollection
{
    public function type(): string
    {
        return Data\Comment::class;
    }
}
