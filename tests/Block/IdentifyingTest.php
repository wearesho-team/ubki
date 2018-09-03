<?php

namespace Wearesho\Bobra\Ubki\Tests\Block;

use Wearesho\Bobra\Ubki\Block;

use PHPUnit\Framework\TestCase;

/**
 * class IdentifyingTest
 * @package Wearesho\Bobra\Ubki\Tests\Component
 */
class IdentifyingTest extends TestCase
{
    /** @var Block\Identifying */
    protected $identifyingComponent;

    protected function setUp(): void
    {
        // todo: change string attribute to Credential object
        $this->identifyingComponent = new Block\Identifying('Some credential');
    }

    public function testType(): void
    {
        $this->assertEquals(Block\Identifying::ID, $this->identifyingComponent->getId());
    }

    public function testGetCredential(): void
    {
        $this->assertEquals('Some credential', $this->identifyingComponent->getCredential());
    }
}
