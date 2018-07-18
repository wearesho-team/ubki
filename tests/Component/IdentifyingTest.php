<?php

namespace Wearesho\Bobra\Ubki\Tests\Component;

use Wearesho\Bobra\Ubki\BaseComponent;
use Wearesho\Bobra\Ubki\Component;

use PHPUnit\Framework\TestCase;

/**
 * class IdentifyingTest
 * @package Wearesho\Bobra\Ubki\Tests\Component
 */
class IdentifyingTest extends TestCase
{
    /** @var Component\Identifying */
    protected $identifyingComponent;

    protected function setUp(): void
    {
        // todo: change string attribute to Credential object
        $this->identifyingComponent = new Component\Identifying('Some credential');
    }

    public function testType(): void
    {
        $this->assertEquals(BaseComponent::IDENTIFYING, $this->identifyingComponent->type());
    }

    public function testGetCredential(): void
    {
        $this->assertEquals('Some credential', $this->identifyingComponent->getCredential());
    }
}
