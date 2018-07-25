<?php

namespace Wearesho\Bobra\Ubki\Tests\Block;

use Wearesho\Bobra\Ubki\Block\CreditRating;
use PHPUnit\Framework\TestCase;

/**
 * class CreditRatingTest
 * @package Wearesho\Bobra\Ubki\Tests\Block
 */
class CreditRatingTest extends TestCase
{
    /** @var CreditRating */
    protected $creditRatingComponent;

    protected function setUp(): void
    {
        $this->creditRatingComponent = new CreditRating('Some rating');
    }

    public function testType()
    {
        $this->assertEquals(CreditRating::ID, $this->creditRatingComponent->getId());
    }

    public function testGetRating(): void
    {
        $this->assertEquals('Some rating', $this->creditRatingComponent->getRating());
    }
}
