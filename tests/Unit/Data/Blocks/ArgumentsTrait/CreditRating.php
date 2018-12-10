<?php

namespace Wearesho\Bobra\Ubki\Tests\Unit\Data\Blocks\ArgumentsTrait;

use Wearesho\Bobra\Ubki;

/**
 * Trait CreditRating
 * @package Wearesho\Bobra\Ubki\Tests\Unit\Data\Blocks\ArgumentsTrait
 *
 * @property-read Ubki\Tests\Fakers\BaseFaker $faker
 */
trait CreditRating
{
    use Ubki\Tests\Unit\Data\Elements\ArgumentsTrait\RatingScore,
        Ubki\Tests\Unit\Data\Elements\ArgumentsTrait\RatingFactors,
        Ubki\Tests\Unit\Data\Elements\ArgumentsTrait\RatingDescription,
        Ubki\Tests\Unit\Data\Elements\ArgumentsTrait\Comment
    {
        Ubki\Tests\Unit\Data\Elements\ArgumentsTrait\RatingScore::arguments as ratingScoreArguments;
        Ubki\Tests\Unit\Data\Elements\ArgumentsTrait\RatingFactors::arguments as ratingFactorsArguments;
        Ubki\Tests\Unit\Data\Elements\ArgumentsTrait\RatingDescription::arguments as ratingDescriptionsArguments;
        Ubki\Tests\Unit\Data\Elements\ArgumentsTrait\Comment::arguments as ratingCommentArguments;
    }

    protected function arguments(): array
    {
        return [
            $this->faker->element->ratingScore($this->ratingScoreArguments()),
            $this->faker->element->ratingDescription($this->ratingDescriptionsArguments()),
            $this->faker->collection->type(Ubki\Data\Collections\Comments::class)
                ->fill(30, $this->faker->element->comment($this->ratingCommentArguments()))->get(),
            $this->faker->element->positiveRatingFactors($this->ratingFactorsArguments()),
            $this->faker->element->negativeRatingFactors($this->ratingFactorsArguments()),
        ];
    }
}
