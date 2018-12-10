<?php

namespace Wearesho\Bobra\Ubki\Tests\Unit\Data\Blocks;

use Wearesho\Bobra\Ubki;

/**
 * Class IdentificationTest
 * @package Wearesho\Bobra\Ubki\Tests\unit\Data\Blocks
 * @coversDefaultClass \Wearesho\Bobra\Ubki\Data\Blocks\Identification
 * @internal
 */
class IdentificationTest extends TestCase
{
    use ArgumentsTrait\Identification;

    protected const ELEMENT = Ubki\Data\Blocks\Identification::class;

    protected function getExpectId(): int
    {
        return Ubki\Data\Blocks\Identification::ID;
    }

    protected function attributesNames(): array
    {
        return [
            'credential',
        ];
    }
}
