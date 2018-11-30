<?php

namespace Wearesho\Bobra\Ubki\Data\Blocks;

use Wearesho\Bobra\Ubki\Infrastructure\Block;
use Wearesho\Bobra\Ubki\Data\Collections;
use Wearesho\Bobra\Ubki\Data\Elements;

/**
 * Class CreditRating
 * @package Wearesho\Bobra\Ubki\Data\Blocks
 */
class CreditRating extends Block
{
    public const ID = 8;

    /** @var Elements\RatingScore */
    protected $score;

    /** @var Elements\RatingDescription */
    protected $description;

    /** @var Collections\Comments */
    protected $comments;

    /** @var Elements\PositiveRatingFactors */
    protected $positiveFactors;

    /** @var Elements\NegativeRatingFactors */
    protected $negativeFactors;

    public function __construct(
        Elements\RatingScore $score,
        Elements\RatingDescription $description,
        Collections\Comments $comments,
        Elements\PositiveRatingFactors $positiveFactors,
        Elements\NegativeRatingFactors $negativeFactors
    ) {
        $this->score = $score;
        $this->description = $description;
        $this->comments = $comments;
        $this->positiveFactors = $positiveFactors;
        $this->negativeFactors = $negativeFactors;
    }

    public function jsonSerialize(): array
    {
        return [
            'rating' => $this->score->jsonSerialize(),
            'description' => $this->description->jsonSerialize(),
            'comments' => $this->comments->jsonSerialize(),
            'factors' => [
                'positive' => $this->positiveFactors->jsonSerialize(),
                'negative' => $this->negativeFactors->jsonSerialize(),
            ],
        ];
    }

    public function getScore(): Elements\RatingScore
    {
        return $this->score;
    }

    public function getDescription(): Elements\RatingDescription
    {
        return $this->description;
    }

    public function getComments(): Collections\Comments
    {
        return $this->comments;
    }

    public function getPositiveFactors(): Elements\PositiveRatingFactors
    {
        return $this->positiveFactors;
    }

    public function getNegativeFactors(): Elements\NegativeRatingFactors
    {
        return $this->negativeFactors;
    }
}
