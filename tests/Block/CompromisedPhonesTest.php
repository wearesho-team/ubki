<?php

namespace Wearesho\Bobra\Ubki\Tests\Block;

use Wearesho\Bobra\Ubki\Block;

use PHPUnit\Framework\TestCase;

/**
 * Class CompromisedPhonesTest
 * @internal
 * @package Wearesho\Bobra\Ubki\Tests\Block
 */
class CompromisedPhonesTest extends TestCase
{
    /** @var Block\CompromisedPhones */
    protected $compromisedPhonesComponent;

    // todo: refactor after implementation Bphone element
    protected function setUp(): void
    {
        parent::setUp();
        $this->compromisedPhonesComponent = new Block\CompromisedPhones('Some phones');
    }

    public function testType(): void
    {
        $this->assertEquals(Block\CompromisedPhones::ID, $this->compromisedPhonesComponent->getId());
    }

    public function testGetPhones(): void
    {
        $this->assertEquals('Some phones', $this->compromisedPhonesComponent->getPhones());
    }
}
