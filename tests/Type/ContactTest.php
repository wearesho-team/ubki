<?php

namespace Wearesho\Bobra\Ubki\Tests\Type;

use Wearesho\Bobra\Ubki\Type\Contact;
use PHPUnit\Framework\TestCase;

/**
 * Class ContactTest
 * @internal
 * @package Wearesho\Bobra\Ubki\Tests\Type
 */
class ContactTest extends TestCase
{
    public function testMOBILE()
    {
        $this->assertEquals(Contact::MOBILE, Contact::MOBILE()->getValue());
    }

    public function testWORK()
    {
        $this->assertEquals(Contact::WORK, Contact::WORK()->getValue());
    }

    public function testHOME()
    {
        $this->assertEquals(Contact::HOME, Contact::HOME()->getValue());
    }

    public function testFAX()
    {
        $this->assertEquals(Contact::FAX, Contact::FAX()->getValue());
    }

    public function testEMAIL()
    {
        $this->assertEquals(Contact::EMAIL, Contact::EMAIL()->getValue());
    }
}
