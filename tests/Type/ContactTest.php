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
    public function testMOBILE(): void
    {
        $description = 'Мобильный телефон';
        $contact = Contact::MOBILE($description);
        $this->assertEquals(Contact::MOBILE, $contact->getValue());
        $this->assertEquals('MOBILE', $contact->getKey());
        $this->assertEquals($description, $contact->getDescription());
    }

    public function testWORK(): void
    {
        $description = 'Рабочий телефон';
        $contact = Contact::WORK($description);
        $this->assertEquals(Contact::WORK, $contact->getValue());
        $this->assertEquals('WORK', $contact->getKey());
        $this->assertEquals($description, $contact->getDescription());
    }

    public function testHOME(): void
    {
        $description = 'Домашний телефон телефон';
        $contact = Contact::HOME($description);
        $this->assertEquals(Contact::HOME, $contact->getValue());
        $this->assertEquals('HOME', $contact->getKey());
        $this->assertEquals($description, $contact->getDescription());
    }

    public function testFAX(): void
    {
        $description = 'Факс';
        $contact = Contact::FAX($description);
        $this->assertEquals(Contact::FAX, $contact->getValue());
        $this->assertEquals('FAX', $contact->getKey());
        $this->assertEquals($description, $contact->getDescription());
    }

    public function testEMAIL(): void
    {
        $description = 'Почта';
        $contact = Contact::EMAIL($description);
        $this->assertEquals(Contact::EMAIL, $contact->getValue());
        $this->assertEquals('EMAIL', $contact->getKey());
        $this->assertEquals($description, $contact->getDescription());
    }
}
