<?php

namespace Wearesho\Bobra\Ubki\Data;

use Wearesho\Bobra\Ubki;

/**
 * Class RatingFactors
 * @package Wearesho\Bobra\Ubki\Data
 */
abstract class RatingFactors extends Ubki\Element
{
    public const COUNT = 'count';
    public const TEXT = 'text';
    public const COMMENTS = 'comments';

    /** @var int */
    protected $count;

    /** @var string */
    protected $description;

    /** @var Ubki\Data\Collection\Comment */
    protected $comments;

    public function __construct(int $count, string $description, Ubki\Data\Collection\Comment $comments)
    {
        $this->count = $count;
        $this->description = $description;
        $this->comments = $comments;
    }

    public function getCount(): int
    {
        return $this->count;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getComments(): Ubki\Data\Collection\Comment
    {
        return $this->comments;
    }
}
