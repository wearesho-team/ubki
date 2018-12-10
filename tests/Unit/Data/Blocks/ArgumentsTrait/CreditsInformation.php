<?php

namespace Wearesho\Bobra\Ubki\Tests\Unit\Data\Blocks\ArgumentsTrait;

use Wearesho\Bobra\Ubki;

/**
 * Trait CreditsInformation
 * @package Wearesho\Bobra\Ubki\Tests\Unit\Data\Blocks\ArgumentsTrait
 */
trait CreditsInformation
{
    use Ubki\Tests\Unit\Data\Elements\ArgumentsTrait\CreditDeal {
        arguments as creditArguments;
    }

    protected function arguments(): array
    {
        return [
            $this->faker->collection->type(Ubki\Data\Collections\CreditDeals::class)
                ->fill(35, $this->faker->element->creditDeal($this->creditArguments()))->get()
        ];
    }
}
