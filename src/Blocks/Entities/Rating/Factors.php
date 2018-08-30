<?php

namespace Wearesho\Bobra\Ubki\Blocks\Entities\Rating;

use Wearesho\Bobra\Ubki\Blocks\Collections\Comments;
use Wearesho\Bobra\Ubki\Blocks\Entities\Comment;
use Wearesho\Bobra\Ubki\ElementInterface;
use Wearesho\Bobra\Ubki\ElementTrait;

/**
 * Class Factors
 * @package Wearesho\Bobra\Ubki\Blocks\Entities\Rating
 */
abstract class Factors implements ElementInterface
{
    use ElementTrait;

    public const COUNT = 'count';
    public const TEXT = 'text';

    /** @var int */
    protected $count;

    /** @var string */
    protected $description;

    /** @var Comments */
    protected $comments;

    public function __construct(int $count, string $description, Comments $comments)
    {
        $this->count = $count;
        $this->description = $description;
        $this->comments = $comments;
    }

    public function jsonSerialize(): array
    {
        return [
            'count' => $this->count,
            'text' => $this->description,
            'comments' => array_map(function (Comment $comment) {
                return $comment->jsonSerialize();
            }, $this->comments->jsonSerialize()),
        ];
    }

    public function getCount(): int
    {
        return $this->count;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getComments(): Comments
    {
        return $this->comments;
    }
}
