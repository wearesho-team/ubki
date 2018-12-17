<?php

namespace Wearesho\Bobra\Ubki\Data\Block;

use Wearesho\Bobra\Ubki;

/**
 * Class CreditRating
 * @package Wearesho\Bobra\Ubki\Data\Block
 */
class CreditRating extends Ubki\Infrastructure\Block implements Ubki\Data\Interfaces\CreditRating
{
    use Ubki\Data\Traits\CreditRating;

    public const ID = 8;

    public function __construct(
        Ubki\Data\Element\RatingScore $score,
        Ubki\Data\Element\RatingDescription $description,
        Ubki\Data\Collection\Comments $comments,
        Ubki\Data\Element\PositiveRatingFactors $positiveFactors,
        Ubki\Data\Element\NegativeRatingFactors $negativeFactors
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
            'score' => $this->getScore(),
            'description' => $this->getDescription(),
            'comments' => $this->getComments(),
            'positiveFactors' => $this->getPositiveFactors(),
            'negativeFactors' => $this->getNegativeFactors(),
        ];
    }
}
