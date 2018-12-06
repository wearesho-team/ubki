<?php

namespace Wearesho\Bobra\Ubki\Tests\Unit\Data\Elements\ArgumentsTrait;

use Carbon\Carbon;
use Wearesho\Bobra\Ubki;

/**
 * Trait RequestData
 * @package Wearesho\Bobra\Ubki\Tests\Unit\Data\Elements\ArgumentsTrait
 *
 * @property-read Ubki\Tests\Fakers\BaseFaker $faker
 */
trait RequestData
{
    protected function arguments(): array
    {
        return [
            $this->faker->dictionary->requestType,
            $this->faker->dictionary->requestReason,
            Carbon::parse(Ubki\Tests\Unit\Data\Elements\RequestDataTest::DATE),
            Ubki\Tests\Unit\Data\Elements\RequestDataTest::ID,
            Ubki\Dictionaries\RequestInitiator::PARTNER()
        ];
    }
}
