<?php

namespace Wearesho\Bobra\Ubki\Tests\CreditRegistry;

use PHPUnit\Framework\TestCase;

use Wearesho\Bobra\Ubki\CreditRegistry\Decision;

/**
 * Class DecisionTest
 * @internal
 * @package Wearesho\Bobra\Ubki\Tests\CreditRegistry
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
