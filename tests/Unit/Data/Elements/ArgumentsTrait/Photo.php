<?php

namespace Wearesho\Bobra\Ubki\Tests\Unit\Data\Elements\ArgumentsTrait;

use Carbon\Carbon;
use Wearesho\Bobra\Ubki;

/**
 * Trait Photo
 * @package Wearesho\Bobra\Ubki\Tests\Unit\Data\Elements\ArgumentsTrait
 */
trait Photo
{
    protected function arguments(): array
    {
        return [
            Carbon::parse(Ubki\Tests\Unit\Data\Elements\PhotoTest::CREATED_AT),
            Ubki\Tests\Unit\Data\Elements\PhotoTest::PHOTO,
            Ubki\Tests\Unit\Data\Elements\PhotoTest::INN
        ];
    }
}
