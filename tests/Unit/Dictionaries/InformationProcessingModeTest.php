<?php

namespace Wearesho\Bobra\Ubki\Tests\Unit\Dictionaries;

use PHPUnit\Framework\TestCase;
use Wearesho\Bobra\Ubki\Dictionaries\InformationProcessingMode;

/**
 * Class InformationProcessingModeTest
 * @package Wearesho\Bobra\Ubki\Tests\Unit\Dictionaries
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
