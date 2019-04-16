<?php

declare(strict_types=1);

namespace Wearesho\Bobra\Ubki\Data;

use Wearesho\Bobra\Ubki;

/**
 * Class Rate
 * @package Wearesho\Bobra\Ubki\Data
 *
 * @method static Rate make(...$arguments)
 */
class Rate implements Ubki\Contract\Data\Rate, \JsonSerializable
{
    use Makeable, Tagable;

    /** @var Ubki\Contract\Data\Rate\Score */
    protected $score;

    /** @var Ubki\Contract\Data\Rate\Description */
    protected $description;

    /** @var Collection\Comment */
    protected $comments;

    /** @var Ubki\Contract\Data\Rate\Factors\Positive */
    protected $positiveFactors;

    /** @var Ubki\Contract\Data\Rate\Factors\Negative */
    protected $negativeFactors;

    /**
     * Rate constructor.
     *
     * @param Ubki\Contract\Data\Rate\Score $score
     * @param Ubki\Contract\Data\Rate\Description $description
     * @param Collection\Comment $comments
     * @param Ubki\Contract\Data\Rate\Factors\Positive $positiveFactors
     * @param Ubki\Contract\Data\Rate\Factors\Negative $negativeFactors
     */
    public function __construct(
        Ubki\Contract\Data\Rate\Score $score,
        Ubki\Contract\Data\Rate\Description $description,
        Collection\Comment $comments,
        Ubki\Contract\Data\Rate\Factors\Positive $positiveFactors,
        Ubki\Contract\Data\Rate\Factors\Negative $negativeFactors
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
            'score' => $this->score,
            'description' => $this->description,
            'comments' => $this->comments,
            'factors' => [
                'positive' => $this->positiveFactors,
                'negative' => $this->negativeFactors,
            ]
        ];
    }

    public static function tag(): string
    {
        return Ubki\Block::TAG;
    }

    public function getScore(): Ubki\Contract\Data\Rate\Score
    {
        return $this->score;
    }

    public function getDescription(): Ubki\Contract\Data\Rate\Description
    {
        return $this->description;
    }

    public function getComments(): Collection\Comment
    {
        return $this->comments;
    }

    public function getPositiveFactors(): Ubki\Contract\Data\Rate\Factors\Positive
    {
        return $this->positiveFactors;
    }

    public function getNegativeFactors(): Ubki\Contract\Data\Rate\Factors\Negative
    {
        return $this->negativeFactors;
    }
}
