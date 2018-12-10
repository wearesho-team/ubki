<?php

namespace Wearesho\Bobra\Ubki\Tests\Unit\Data\Blocks\ArgumentsTrait;

use Wearesho\Bobra\Ubki;

/**
 * Trait InsurancesInformation
 * @package Wearesho\Bobra\Ubki\Tests\Unit\Data\Blocks\ArgumentsTrait
 */
trait InsurancesInformation
{
    use Ubki\Tests\Unit\Data\Elements\ArgumentsTrait\InsuranceDeal {
        arguments as insuranceArguments;
    }

    protected function arguments(): array
    {
        return [
            $this->faker->collection->type(Ubki\Data\Collections\InsuranceDeals::class)
                ->fill(50, $this->faker->element->insuranceDeal($this->insuranceArguments()))->get(),
        ];
    }
}
