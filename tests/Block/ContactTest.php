<?php

namespace Wearesho\Bobra\Ubki\Tests\Block;

use Wearesho\Bobra\Ubki\Block;

use PHPUnit\Framework\TestCase;

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
        // todo: change string attribute to Contact Collection object
        $this->contacts = new Block\Contact('Some contacts');
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