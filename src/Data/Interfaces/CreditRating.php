<?php

namespace Wearesho\Bobra\Ubki\Data\Interfaces;

use Wearesho\Bobra\Ubki;

/**
 * Interface CreditRating
 * @package Wearesho\Bobra\Ubki\Data\Interfaces
 */
interface CreditRating extends Ubki\ElementInterface
{
    public function getScore(): Ubki\Data\Element\RatingScore;

    public function getDescription(): Ubki\Data\Element\RatingDescription;

    public function getComments(): Ubki\Data\Collection\Comments;

    public function getPositiveFactors(): Ubki\Data\Element\PositiveRatingFactors;

    public function getNegativeFactors(): Ubki\Data\Element\NegativeRatingFactors;
}
