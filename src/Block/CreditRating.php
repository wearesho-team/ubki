<?php

namespace Wearesho\Bobra\Ubki\Block;

use Wearesho\Bobra\Ubki;

/**
 * Class CreditRating
 * @package Wearesho\Bobra\Ubki\Block
 */
class CreditRating extends Ubki\Block
{
    public const ID = 8;

    protected $rating;

    // todo: refactor after implementing Rating element
    public function __construct($rating)
    {
        $this->rating = $rating;
    }

    public function getRating()
    {
        return $this->rating;
    }
}
