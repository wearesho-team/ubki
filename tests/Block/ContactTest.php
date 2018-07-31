<?php

namespace Wearesho\Bobra\Ubki\Tests\Block;


use Carbon\Carbon;
use PHPUnit\Framework\TestCase;

use Wearesho\Bobra\Ubki\Block;
use Wearesho\Bobra\Ubki\Data;

/**
 * Class ContactTest
 * @internal
 * @package Wearesho\Bobra\Ubki\Tests\Block
 */
class ContactTest extends TestCase
{
    /** @var Block\Contact */
    protected $contacts;

    protected function setUp(): void
    {
        $this->contacts = new Block\Contact(
            new Data\Contact\Collection([
                new Data\Contact\Entity(
                    Carbon::create(2018, 10, 10, 10, 10, 10),
                    '+380930439475',
                    1
                )
            ])
        );
    }

    public function testType(): void
    {
        $this->assertEquals(Block\Contact::ID, $this->contacts->getId());
    }

    public function testGetContacts(): void
    {
        $this->assertEquals('Some contacts', $this->contacts->getContacts());
    }
}
