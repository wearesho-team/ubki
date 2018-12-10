<?php

namespace Wearesho\Bobra\Ubki\Tests\Unit\Data\Elements\ArgumentsTrait;

use Wearesho\Bobra\Ubki;
use Wearesho\Bobra\Ubki\Data\Elements;

/**
 * Trait RatingFactors
 * @package Wearesho\Bobra\Ubki\Tests\Unit\Data\Elements\ArgumentsTrait
 *
 * @property-read Ubki\Tests\Fakers\BaseFaker $faker
 */
trait RatingFactors
{
    use Comment {
        arguments as protected commentArguments;
    }

    protected function arguments(): array
    {
        return [
            Ubki\Tests\Unit\Data\Elements\PositiveRatingFactorsTest::COUNT,
            Ubki\Tests\Unit\Data\Elements\PositiveRatingFactorsTest::DESCRIPTION,
            $this->faker->collection->type(Ubki\Data\Collections\Comments::class)
                ->fill(30, $this->faker->element->comment($this->commentArguments()))->get()
        ];
    }
}
