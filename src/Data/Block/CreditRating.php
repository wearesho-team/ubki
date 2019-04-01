<?php

namespace Wearesho\Bobra\Ubki\Data\Block;

use Wearesho\Bobra\Ubki;

/**
 * Class CreditRating
 * @package Wearesho\Bobra\Ubki\Data\Block
 */
class CreditRating extends Ubki\Block
{
    public const ID = 8;

    /** @var Ubki\Data\RatingScore */
    protected $score;

    /** @var Ubki\Data\RatingDescription */
    protected $description;

    /** @var Ubki\Data\Collection\Comment */
    protected $comments;

    /** @var Ubki\Data\PositiveRatingFactors */
    protected $positiveFactors;

    /** @var Ubki\Data\NegativeRatingFactors */
    protected $negativeFactors;

    public function __construct(
        Ubki\Data\RatingScore $score,
        Ubki\Data\RatingDescription $description,
        Ubki\Data\Collection\Comment $comments,
        Ubki\Data\PositiveRatingFactors $positiveFactors,
        Ubki\Data\NegativeRatingFactors $negativeFactors
    ) {
        $this->score = $score;
        $this->description = $description;
        $this->comments = $comments;
        $this->positiveFactors = $positiveFactors;
        $this->negativeFactors = $negativeFactors;
    }

    public function getScore(): Ubki\Data\RatingScore
    {
        return $this->score;
    }

    public function getDescription(): Ubki\Data\RatingDescription
    {
        return $this->description;
    }

    public function getComments(): Ubki\Data\Collection\Comment
    {
        return $this->comments;
    }

    public function getPositiveFactors(): Ubki\Data\PositiveRatingFactors
    {
        return $this->positiveFactors;
    }

    public function getNegativeFactors(): Ubki\Data\NegativeRatingFactors
    {
        return $this->negativeFactors;
    }
}
