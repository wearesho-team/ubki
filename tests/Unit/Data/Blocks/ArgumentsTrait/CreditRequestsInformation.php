<?php

namespace Wearesho\Bobra\Ubki\Tests\Unit\Data\Blocks\ArgumentsTrait;

use Wearesho\Bobra\Ubki;

/**
 * Trait CreditRequestsInformation
 * @package Wearesho\Bobra\Ubki\Tests\Unit\Data\Blocks\ArgumentsTrait
 *
 * @property-read Ubki\Tests\Fakers\BaseFaker $faker
 */
trait CreditRequestsInformation
{
    use Ubki\Tests\Unit\Data\Elements\ArgumentsTrait\CreditRequest,
        Ubki\Tests\Unit\Data\Elements\ArgumentsTrait\RegistryTimes
    {
        Ubki\Tests\Unit\Data\Elements\ArgumentsTrait\CreditRequest::arguments as requestArguments;
        Ubki\Tests\Unit\Data\Elements\ArgumentsTrait\RegistryTimes::arguments as registryTimesArguments;
    }

    protected function arguments(): array
    {
        return [
            $this->faker->collection->type(Ubki\Data\Collections\CreditRequests::class)
                ->fill(10, $this->faker->element->creditRequest($this->requestArguments()))->get(),
            $this->faker->element->registryTimes($this->registryTimesArguments()),
        ];
    }
}
