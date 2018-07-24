<?php

namespace Wearesho\Bobra\Ubki\Tests\Block;

use Wearesho\Bobra\Ubki\Block;

use PHPUnit\Framework\TestCase;

/**
 * Class CourtDecisionTest
 * @internal
 * @package Wearesho\Bobra\Ubki\Tests\Block
 */
class CourtDecisionTest extends TestCase
{
    /** @var Block\CourtDecision */
    protected $courtDecisionsComponent;

    protected function setUp(): void
    {
        // todo: change string attribute to CourtDecision element
        $this->courtDecisionsComponent = new Block\CourtDecision('Some decisions');
    }

    public function testType(): void
    {
        $this->assertEquals(Block\CourtDecision::ID, $this->courtDecisionsComponent->getId());
    }

    public function testGetDecisions(): void
    {
        $this->assertEquals('Some decisions', $this->courtDecisionsComponent->getDecisions());
    }
}
