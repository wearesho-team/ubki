<?php

namespace Wearesho\Bobra\Ubki\Tests\Unit\Data\Blocks\ArgumentsTrait;

use Wearesho\Bobra\Ubki;

/**
 * Trait ContactsInformation
 * @package Wearesho\Bobra\Ubki\Tests\Unit\Data\Blocks\ArgumentsTrait
 *
 * @property-read Ubki\Tests\Fakers\BaseFaker $faker
 */
trait ContactsInformation
{
    use Ubki\Tests\Unit\Data\Elements\ArgumentsTrait\Contact {
        arguments as contactArguments;
    }

    protected function arguments(): array
    {
        return [
            $this->faker->collection->type(Ubki\Data\Collections\Contacts::class)
                ->fill(25, $this->faker->element->contact($this->contactArguments()))->get()
        ];
    }
}
