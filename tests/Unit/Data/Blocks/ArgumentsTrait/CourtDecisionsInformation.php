<?php

namespace Wearesho\Bobra\Ubki\Tests\Unit\Data\Blocks\ArgumentsTrait;

use Wearesho\Bobra\Ubki;

/**
 * Trait CourtDecisionsInformation
 * @package Wearesho\Bobra\Ubki\Tests\Unit\Data\Blocks\ArgumentsTrait
 *
 * @property-read Ubki\Tests\Fakers\BaseFaker $faker
 */
trait CourtDecisionsInformation
{
    use Ubki\Tests\Unit\Data\Elements\ArgumentsTrait\CourtDecision {
        arguments as courtDecisionArguments;
    }

    protected function arguments(): array
    {
        return [
            $this->faker->collection->type(Ubki\Data\Collections\CourtDecisions::class)
                ->fill(20, $this->faker->element->courtDecision($this->courtDecisionArguments()))->get()
        ];
    }
}
