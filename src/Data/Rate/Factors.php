<?php

declare(strict_types=1);

namespace Wearesho\Bobra\Ubki\Data\Rate;

use Wearesho\Bobra\Ubki;

/**
 * Class Factors
 * @package Wearesho\Bobra\Ubki\Data\Rate
 */
abstract class Factors implements Ubki\Contract\Data\Rate\Factors
{
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
