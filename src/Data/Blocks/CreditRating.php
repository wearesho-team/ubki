<?php

namespace Wearesho\Bobra\Ubki\Data\Blocks;

use Wearesho\Bobra\Ubki;

/**
 * Class CreditRating
 * @package Wearesho\Bobra\Ubki\Data\Blocks
 */
class CreditRating extends Ubki\Infrastructure\Block
{
    public const ID = 8;

    /** @var Ubki\Data\Elements\RatingScore */
    protected $score;

    /** @var Ubki\Data\Elements\RatingDescription */
    protected $description;

    /** @var Ubki\Data\Collections\Comments */
    protected $comments;

    /** @var Ubki\Data\Elements\PositiveRatingFactors */
    protected $positiveFactors;

    /** @var Ubki\Data\Elements\NegativeRatingFactors */
    protected $negativeFactors;

    public function __construct(
        Ubki\Data\Elements\RatingScore $score,
        Ubki\Data\Elements\RatingDescription $description,
        Ubki\Data\Collections\Comments $comments,
        Ubki\Data\Elements\PositiveRatingFactors $positiveFactors,
        Ubki\Data\Elements\NegativeRatingFactors $negativeFactors
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

    public function getScore(): Ubki\Data\Elements\RatingScore
    {
        return $this->score;
    }

    public function getDescription(): Ubki\Data\Elements\RatingDescription
    {
        return $this->description;
    }

    public function getComments(): Ubki\Data\Collections\Comments
    {
        return $this->comments;
    }

    public function getPositiveFactors(): Ubki\Data\Elements\PositiveRatingFactors
    {
        return $this->positiveFactors;
    }

    public function getNegativeFactors(): Ubki\Data\Elements\NegativeRatingFactors
    {
        return $this->negativeFactors;
    }
}
