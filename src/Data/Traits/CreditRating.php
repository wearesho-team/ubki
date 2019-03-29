<?php

namespace Wearesho\Bobra\Ubki\Data\Traits;

use Wearesho\Bobra\Ubki;

/**
 * Trait CreditRating
 * @package Wearesho\Bobra\Ubki\Data\Traits
 */
trait CreditRating
{
    /** @var Ubki\Data\Element\RatingScore */
    protected $score;

    /** @var Ubki\Data\Element\RatingDescription */
    protected $description;

    /** @var Ubki\Data\Collection\Comments */
    protected $comments;

    /** @var Ubki\Data\Element\PositiveRatingFactors */
    protected $positiveFactors;

    /** @var Ubki\Data\Element\NegativeRatingFactors */
    protected $negativeFactors;

    public function getScore(): Ubki\Data\Element\RatingScore
    {
        return $this->score;
    }

    public function getDescription(): Ubki\Data\Element\RatingDescription
    {
        return $this->description;
    }

    public function getComments(): Ubki\Data\Collection\Comments
    {
        return $this->comments;
    }

    public function getPositiveFactors(): Ubki\Data\Element\PositiveRatingFactors
    {
        return $this->positiveFactors;
    }

    public function getNegativeFactors(): Ubki\Data\Element\NegativeRatingFactors
    {
        return $this->negativeFactors;
    }
}
