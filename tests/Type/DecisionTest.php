<?php

namespace Wearesho\Bobra\Ubki\Tests\Type;

use Wearesho\Bobra\Ubki\Type\Decision;
use PHPUnit\Framework\TestCase;

/**
 * Class DecisionTest
 * @internal
 * @package Wearesho\Bobra\Ubki\Tests\Type
 */
class DecisionTest extends TestCase
{
    public function testPositive(): void
    {
        $description = 'Положительное решение';
        $decision = Decision::POSITIVE($description);
        $this->assertEquals(Decision::POSITIVE, $decision->getValue());
        $this->assertEquals('POSITIVE', $decision->getKey());
        $this->assertEquals($description, $decision->getDescription());
    }

    public function testNegative(): void
    {
        $description = 'негативное';
        $decision = Decision::NEGATIVE($description);
        $this->assertEquals(Decision::NEGATIVE, $decision->getValue());
        $this->assertEquals('NEGATIVE', $decision->getKey());
        $this->assertEquals($description, $decision->getDescription());
    }
}
