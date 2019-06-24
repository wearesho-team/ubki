<?php

namespace Wearesho\Bobra\Ubki\Tests\Unit\Exception;

use Carbon\Carbon;
use PHPUnit\Framework\TestCase;
use Wearesho\Bobra\Ubki;

/**
 * Class OverdueTest
 * @package Wearesho\Bobra\Ubki\Tests\Unit\Exception
 */
class OverdueTest extends TestCase
{
    public function testViaDealLife(): void
    {
        $this->expectException(Ubki\Exception\Overdue::class);
        $this->expectExceptionMessage("Deal id: id. The field number with overdue days can not be = 0 if the current delayed debt field is not equal to 0. (and vice versa)");//phpcs:ignore

        new Ubki\Data\DealLife(
            'id',
            1,
            2018,
            Carbon::now(),
            Carbon::now(),
            Ubki\Dictionary\DealStatus::OPEN(),
            100,
            100,
            15,
            10,
            0,
            Ubki\Dictionary\Flag::NO(),
            Ubki\Dictionary\Flag::NO(),
            Ubki\Dictionary\Flag::NO(),
            Carbon::now()
        );
    }
}
