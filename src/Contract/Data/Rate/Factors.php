<?php

declare(strict_types=1);

namespace Wearesho\Bobra\Ubki\Contract\Data\Rate;

use Wearesho\Bobra\Ubki;

/**
 * Interface Factors
 * @package Wearesho\Bobra\Ubki\Contract\Data\Rate
 */
interface Factors
{
    public const COUNT = 'count';
    public const TEXT = 'text';
    public const COMMENTS = 'comments';

    public function getCount(): int;

    public function getDescription(): string;

    public function getComments(): Ubki\Data\Collection\Comment;
}
