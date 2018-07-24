<?php

namespace Wearesho\Bobra\Ubki\Tests\Block;

use Wearesho\Bobra\Ubki\Block;

use PHPUnit\Framework\TestCase;

/**
 * Class SearchPassportMiaTest
 * @internal
 * @package Wearesho\Bobra\Ubki\Tests\Block
 */
class SearchPassportMiaTest extends TestCase
{
    /** @var Block\SearchPassportMia */
    protected $searchPassportMiaComponent;

    protected function setUp(): void
    {
        parent::setUp();

        $this->searchPassportMiaComponent = new Block\SearchPassportMia('Some search element');
    }

    public function testType(): void
    {
        $this->assertEquals(Block\SearchPassportMia::ID, $this->searchPassportMiaComponent->getId());
    }

    public function testGetSearch(): void
    {
        $this->assertEquals('Some search element', $this->searchPassportMiaComponent->getSearch());
    }
}
