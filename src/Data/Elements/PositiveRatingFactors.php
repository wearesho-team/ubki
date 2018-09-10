<?php

namespace Wearesho\Bobra\Ubki\Data\Elements;

/**
 * Class PositiveRatingFactors
 * @package Wearesho\Bobra\Ubki\Data\Elements
 */
class PositiveRatingFactors extends RatingFactors
{
    public const TAG = 'pfactors';

    public function tag(): string
    {
        return static::TAG;
    }

    public function jsonSerialize(): array
    {
        return parent::jsonSerialize();
    }
}
