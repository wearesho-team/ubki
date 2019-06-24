<?php

declare(strict_types=1);

namespace Wearesho\Bobra\Ubki\Tests\Unit;

use Wearesho\Bobra\Ubki;

/**
 * Class TestCase
 * @package Wearesho\Bobra\Ubki\Tests\Unit
 */
abstract class TestCase extends \PHPUnit\Framework\TestCase
{
    protected function expectValidationException(string $value, Ubki\Validator $regular): void
    {
        $this->expectException(Ubki\Exception\Validator::class);
        $this->expectExceptionMessage("Validation exception with value: [{$value}] on regular [{$regular->getKey()}]");
    }
}
