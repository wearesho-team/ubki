<?php

namespace Wearesho\Bobra\Ubki\Tests\Unit\Data\Blocks\ArgumentsTrait;

use Wearesho\Bobra\Ubki;

/**
 * Trait Identification
 * @package Wearesho\Bobra\Ubki\Tests\Unit\Data\Blocks\ArgumentsTrait
 */
trait Identification
{
    use Ubki\Tests\Unit\Data\Elements\ArgumentsTrait\Credential {
        arguments as credentialArguments;
    }

    protected function arguments(): array
    {
        return [
            $this->faker->element->credential($this->credentialArguments()),
        ];
    }
}
