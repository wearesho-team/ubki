<?php

namespace Wearesho\Bobra\Ubki\Tests\Unit\Data\Elements\ArgumentsTrait;

use Carbon\Carbon;

/**
 * Trait IdentificationPerson
 * @package Wearesho\Bobra\Ubki\Tests\Unit\Data\Elements\ArgumentsTrait
 */
trait IdentificationPerson
{
    protected function arguments(): array
    {
        return [
            static::NAME,
            static::INN,
            static::SURNAME,
            static::PATRONYMIC,
            Carbon::parse(static::BIRTH_DATE),
            static::ORGANIZATION
        ];
    }
}
