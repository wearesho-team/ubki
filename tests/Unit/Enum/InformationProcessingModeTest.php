<?php

namespace Wearesho\Bobra\Ubki\Tests\Unit\Enum;

use PHPUnit\Framework\TestCase;
use Wearesho\Bobra\Ubki\Enum\InformationProcessingMode;

/**
 * Class InformationProcessingModeTest
 * @package Wearesho\Bobra\Ubki\Tests\Unit\Enum
 * @coversDefaultClass InformationProcessingMode
 * @internal
 */
class InformationProcessingModeTest extends TestCase
{
    public function testEnums(): void
    {
        $this->assertEquals(
            InformationProcessingMode::DELETE(),
            new InformationProcessingMode(InformationProcessingMode::DELETE)
        );
        $this->assertEquals(
            InformationProcessingMode::INSERT(),
            new InformationProcessingMode(InformationProcessingMode::INSERT)
        );
        $this->assertEquals(
            InformationProcessingMode::UPDATE(),
            new InformationProcessingMode(InformationProcessingMode::UPDATE)
        );
    }
}
