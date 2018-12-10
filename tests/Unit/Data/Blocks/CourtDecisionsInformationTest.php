<?php

namespace Wearesho\Bobra\Ubki\Tests\Unit\Data\Blocks;

use Wearesho\Bobra\Ubki;

/**
 * Class CourtDecisionsInformationTest
 * @package Wearesho\Bobra\Ubki\Tests\Unit\Data\Blocks
 * @coversDefaultClass \Wearesho\Bobra\Ubki\Data\Blocks\CourtDecisionsInformation
 * @internal
 */
class CourtDecisionsInformationTest extends TestCase
{
    use ArgumentsTrait\CourtDecisionsInformation;

    protected const ELEMENT = Ubki\Data\Blocks\CourtDecisionsInformation::class;

    protected function attributesNames(): array
    {
        return [
            'decisions',
        ];
    }

    protected function getExpectId(): int
    {
        return Ubki\Data\Blocks\CourtDecisionsInformation::ID;
    }
}
