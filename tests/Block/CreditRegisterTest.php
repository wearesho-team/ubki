<?php

namespace Wearesho\Bobra\Ubki\Tests\Block;

use Wearesho\Bobra\Ubki\Block;

use PHPUnit\Framework\TestCase;

/**
 * Class CreditRegisterTest
 * @internal
 * @package Wearesho\Bobra\Ubki\Tests\Block
 */
class CreditRegisterTest extends TestCase
{
    /** @var Block\CreditRegister */
    protected $creditRegisterComponent;

    protected function setUp(): void
    {
        // todo: change string attribute to Credres element
        // todo: change string attribute to Reestrtrim element
        $this->creditRegisterComponent = new Block\CreditRegister('Some credreses', 'Some trim');
    }

    public function testType(): void
    {
        $this->assertEquals(Block\CreditRegister::ID, $this->creditRegisterComponent->getId());
    }

    public function testGetCreditRequests(): void
    {
        $this->assertEquals('Some credreses', $this->creditRegisterComponent->getCreditRequests());
    }

    public function testGetRegistryTrim(): void
    {
        $this->assertEquals('Some trim', $this->creditRegisterComponent->getRegistryTrim());
    }
}
