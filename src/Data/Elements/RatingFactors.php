<?php

namespace Wearesho\Bobra\Ubki\Data\Elements;

use Wearesho\Bobra\Ubki;

/**
 * Class RatingFactors
 * @package Wearesho\Bobra\Ubki\Data\Elements
 */
abstract class RatingFactors extends Ubki\Infrastructure\Element
{
    public const COUNT = 'count';
    public const TEXT = 'text';
    public const COMMENTS = 'comments';

    /** @var int */
    protected $count;

    /** @var string */
    protected $description;

    /** @var Ubki\Data\Collections\Comments */
    protected $comments;

    public function __construct(int $count, string $description, Ubki\Data\Collections\Comments $comments)
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

    public function getComments(): Ubki\Data\Collections\Comments
    {
        return $this->comments;
    }
}
