<?php

namespace Wearesho\Bobra\Ubki\Data\Element;

use Wearesho\Bobra\Ubki;

/**
 * Class RatingFactors
 * @package Wearesho\Bobra\Ubki\Data\Element
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

    /** @var Ubki\Data\Collection\Comments */
    protected $comments;

    public function __construct(int $count, string $description, Ubki\Data\Collection\Comments $comments)
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

    public function getComments(): Ubki\Data\Collection\Comments
    {
        return $this->comments;
    }
}
