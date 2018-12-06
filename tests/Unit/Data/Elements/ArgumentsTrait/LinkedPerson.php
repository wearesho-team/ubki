<?php

namespace Wearesho\Bobra\Ubki\Tests\Unit\Data\Elements\ArgumentsTrait;

use Carbon\Carbon;
use Wearesho\Bobra\Ubki;

/**
 * Trait LinkedPerson
 * @package Wearesho\Bobra\Ubki\Tests\Unit\Data\Elements\ArgumentsTrait
 */
trait LinkedPerson
{
    protected function arguments(): array
    {
        return [
            Ubki\Tests\Unit\Data\Elements\LinkedPersonTest::NAME,
            Ubki\Dictionaries\LinkedIdentifierRole::DIRECTOR(),
            Carbon::parse(Ubki\Tests\Unit\Data\Elements\LinkedPersonTest::ISSUE_DATE),
            Ubki\Tests\Unit\Data\Elements\LinkedPersonTest::ERGPOU
        ];
    }
}
