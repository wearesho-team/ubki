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
    public function testMobile(): void
    {
        $description = 'Мобильный телефон';
        $contact = Contact::MOBILE($description);
        $this->assertEquals(Contact::MOBILE, $contact->getValue());
        $this->assertEquals('MOBILE', $contact->getKey());
        $this->assertEquals($description, $contact->getDescription());
    }

    public function testWork(): void
    {
        $description = 'Рабочий телефон';
        $contact = Contact::WORK($description);
        $this->assertEquals(Contact::WORK, $contact->getValue());
        $this->assertEquals('WORK', $contact->getKey());
        $this->assertEquals($description, $contact->getDescription());
    }

    public function testHome(): void
    {
        $description = 'Домашний телефон телефон';
        $contact = Contact::HOME($description);
        $this->assertEquals(Contact::HOME, $contact->getValue());
        $this->assertEquals('HOME', $contact->getKey());
        $this->assertEquals($description, $contact->getDescription());
    }

    public function testFax(): void
    {
        $description = 'Факс';
        $contact = Contact::FAX($description);
        $this->assertEquals(Contact::FAX, $contact->getValue());
        $this->assertEquals('FAX', $contact->getKey());
        $this->assertEquals($description, $contact->getDescription());
    }

    public function testEmail(): void
    {
        $description = 'Почта';
        $contact = Contact::EMAIL($description);
        $this->assertEquals(Contact::EMAIL, $contact->getValue());
        $this->assertEquals('EMAIL', $contact->getKey());
        $this->assertEquals($description, $contact->getDescription());
    }
}
