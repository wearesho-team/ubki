<?php

namespace Wearesho\Bobra\Ubki\Data\Elements;

use Wearesho\Bobra\Ubki\Data\Collections\Comments;
use Wearesho\Bobra\Ubki\Infrastructure\Element;

/**
 * Class RatingFactors
 * @package Wearesho\Bobra\Ubki\Data\Elements
 */
abstract class RatingFactors extends Element
{
    public const COUNT = 'count';
    public const TEXT = 'text';
    public const COMMENTS = 'comments';

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
            static::COUNT => $this->count,
            static::TEXT => $this->description,
            'comments' => $this->comments->jsonSerialize(),
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
