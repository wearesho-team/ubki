<?php

namespace Wearesho\Bobra\Ubki\Tests\Unit\Data\Elements\ArgumentsTrait;

use Carbon\Carbon;
use Wearesho\Bobra\Ubki;
use Wearesho\Bobra\Ubki\Data\Elements;

/**
 * Trait InsuranceDeal
 * @package Wearesho\Bobra\Ubki\Tests\Unit\Data\Elements\ArgumentsTrait
 *
 * @property-read Ubki\Tests\Fakers\BaseFaker $faker
 */
trait InsuranceDeal
{
    use InsuranceEvent {
        InsuranceEvent::arguments as protected eventArguments;
    }

    protected function arguments(): array
    {
        return [
            Ubki\Tests\Unit\Data\Elements\InsuranceDealTest::INN,
            Ubki\Tests\Unit\Data\Elements\InsuranceDealTest::ID,
            Carbon::parse(Ubki\Tests\Unit\Data\Elements\InsuranceDealTest::INFORMATION_DATE),
            Carbon::parse(Ubki\Tests\Unit\Data\Elements\InsuranceDealTest::START_DATE),
            Carbon::parse(Ubki\Tests\Unit\Data\Elements\InsuranceDealTest::END_DATE),
            Ubki\Dictionaries\InsuranceDealType::ACCIDENT(),
            Ubki\Dictionaries\DealStatus::CLOSE(),
            $this->faker->collection->type(Ubki\Data\Collections\InsuranceEvents::class)
                ->fill(20, $this->faker->element->insuranceEvent($this->eventArguments()))->get(),
            Carbon::parse(Ubki\Tests\Unit\Data\Elements\InsuranceDealTest::ACTUAL_END_DATE)
        ];
    }
}
