<?php

namespace Wearesho\Bobra\Ubki\Tests\Unit\Dictionaries;

use PHPUnit\Framework\TestCase;
use Wearesho\Bobra\Ubki\Dictionaries\Classification;

/**
 * Class ClassificationTest
 * @package Wearesho\Bobra\Ubki\Tests\Unit\Dictionaries
 * @coversDefaultClass \Wearesho\Bobra\Ubki\Dictionaries\Classification
 * @internal
 */
class ClassificationTest extends TestCase
{
    public function testEnum(): void
    {
        $this->assertEquals(Classification::INDIVIDUAL(), new Classification(Classification::INDIVIDUAL));
        $this->assertEquals(Classification::ENTREPRENEUR(), new Classification(Classification::ENTREPRENEUR));
    }
}
