<?php

namespace Wearesho\Bobra\Ubki\Data\Elements\Rating;

use Wearesho\Bobra\Ubki\Data\Collections\Comments;
use Wearesho\Bobra\Ubki\Data\Elements\Comment;
use Wearesho\Bobra\Ubki\ElementInterface;
use Wearesho\Bobra\Ubki\ElementTrait;

/**
 * Class Factors
 * @package Wearesho\Bobra\Ubki\Data\Elements\Rating
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
