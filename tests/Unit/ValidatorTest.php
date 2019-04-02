<?php

namespace Wearesho\Bobra\Ubki\Tests\Unit;

use PHPUnit\Framework\TestCase;
use Wearesho\Bobra\Ubki;

/**
 * Class ValidatorTest
 * @package Wearesho\Bobra\Ubki\Tests\Unit
 */
class ValidatorTest extends TestCase
{
    public function testText(): void
    {
        $value = 'asdqwe12	q`asdSDQWE!@';
        $validator = Ubki\Validator::TEXT_40();

        $this->expectException(Ubki\Exception\Validator::class);
        $this->expectExceptionMessage("Validation exception with value: [$value] on regular [{$validator->getKey()}]");

        $validator->validate($value);
    }
}
