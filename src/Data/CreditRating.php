<?php

namespace Wearesho\Bobra\Ubki\Data;

use Wearesho\Bobra\Ubki\Block;
use Wearesho\Bobra\Ubki\Data\Elements\Comment;
use Wearesho\Bobra\Ubki\Data\Elements\Rating;

/**
 * Class CreditRating
 * @package Wearesho\Bobra\Ubki\Data
 */
class CreditRating extends Block
{
    public const ID = 8;

    /** @var Rating\Score */
    protected $score;

    /** @var Rating\Description */
    protected $description;

    /** @var Collections\Comments */
    protected $comments;

    /** @var Rating\PositiveFactors */
    protected $positiveFactors;

    /** @var Rating\NegativeFactors */
    protected $negativeFactors;

    public function __construct(
        Rating\Score $score,
        Rating\Description $description,
        Collections\Comments $comments,
        Rating\PositiveFactors $positiveFactors,
        Rating\NegativeFactors $negativeFactors
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
            'score' => $this->score->jsonSerialize(),
            'description' => $this->description->jsonSerialize(),
            'comments' => array_map(function (Comment $comment) {
                return $comment->jsonSerialize();
            }, $this->comments->jsonSerialize()),
            'factors' => [
                'positive' => $this->positiveFactors->jsonSerialize(),
                'negative' => $this->negativeFactors->jsonSerialize(),
            ],
        ];
    }

    public function getScore(): Rating\Score
    {
        return $this->score;
    }

    public function getDescription(): Rating\Description
    {
        return $this->description;
    }

    public function getComments(): Collections\Comments
    {
        return $this->comments;
    }

    public function getPositiveFactors(): Rating\PositiveFactors
    {
        return $this->positiveFactors;
    }

    public function getNegativeFactors(): Rating\NegativeFactors
    {
        return $this->negativeFactors;
    }
}
