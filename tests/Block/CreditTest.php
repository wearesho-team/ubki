<?php

namespace Wearesho\Bobra\Ubki\Tests\Block;

use Wearesho\Bobra\Ubki\Block;

use PHPUnit\Framework\TestCase;

/**
 * Class CreditTest
 * @internal
 * @package Wearesho\Bobra\Ubki\Tests\Block
 */
class CreditTest extends TestCase
{
    /** @var Block\Credit */
    protected $creditDeals;

    protected function setUp(): void
    {
        // todo: change string attribute to CreditDeal object
        $this->creditDeals = new Block\Credit('Some deals');
    }

    public function testGetDeals()
    {
        $this->assertEquals(Block\Credit::ID, $this->creditDeals->getId());
        $this->assertEquals('Some deals', $this->creditDeals->getDeals());
    }
}
