<?php

namespace Wearesho\Bobra\Ubki\Tests\Unit\Data\Blocks;

use Wearesho\Bobra\Ubki;

/**
 * Class CreditsInformationTest
 * @package Wearesho\Bobra\Ubki\Tests\Data\Blocks
 * @coversDefaultClass \Wearesho\Bobra\Ubki\Data\Blocks\CreditsInformation
 * @internal
 */
class CreditsInformationTest extends TestCase
{
    use ArgumentsTrait\CreditsInformation;

    protected const ELEMENT = Ubki\Data\Blocks\CreditsInformation::class;

    protected function getExpectId(): int
    {
        return Ubki\Data\Blocks\CreditsInformation::ID;
    }

    protected function attributesNames(): array
    {
        return [
            'deals'
        ];
    }
}
