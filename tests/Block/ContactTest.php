<?php

namespace Wearesho\Bobra\Ubki\Tests\Block;

use Carbon\Carbon;

use Wearesho\Bobra\Ubki;

use PHPUnit\Framework\TestCase;

/**
 * Class ContactTest
 * @internal
 * @package Wearesho\Bobra\Ubki\Tests\Block
 */
class ContactTest extends TestCase
{
    /** @var Ubki\Block\Contact */
    protected $contact;

    protected function setUp(): void
    {
        Carbon::setTestNow(Carbon::now());

        $this->contact = new Ubki\Block\Contact(
            Carbon::getTestNow(),
            '+380930439475',
            1
        );
    }

    public function testGetType(): void
    {
        $this->assertEquals(
            1,
            $this->contact->getType()
        );
    }

    public function testGetCreatedAt(): void
    {
        $this->assertEquals(
            Carbon::getTestNow()
                ->toDateTimeString(),
            Carbon::instance($this->contact->getCreatedAt())
                ->toDateTimeString()
        );
    }

    public function testGetValue(): void
    {
        $this->assertEquals(
            '+380930439475',
            $this->contact->getValue()
        );
    }

    public function testGetInn(): void
    {
        $this->assertNull(
            $this->contact->getInn()
        );
    }
}
