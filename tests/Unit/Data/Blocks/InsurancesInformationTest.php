<?php

namespace Wearesho\Bobra\Ubki\Tests\Unit\Data\Blocks;

use Wearesho\Bobra\Ubki;

/**
 * Class InsurancesInformationTest
 * @package Wearesho\Bobra\Ubki\Tests\Unit\Data\Blocks
 * @coversDefaultClass \Wearesho\Bobra\Ubki\Data\Blocks\InsurancesInformation
 * @internal
 */
class InsurancesInformationTest extends TestCase
{
    use ArgumentsTrait\InsurancesInformation;

    protected const ELEMENT = Ubki\Data\Blocks\InsurancesInformation::class;

    protected function attributesNames(): array
    {
        return [
            'deals'
        ];
    }

    protected function getExpectId(): int
    {
        return Ubki\Data\Blocks\InsurancesInformation::ID;
    }
}
