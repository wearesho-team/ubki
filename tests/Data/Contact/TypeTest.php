<?php

namespace Wearesho\Bobra\Ubki\Tests\Data\Contact;

use Wearesho\Bobra\Ubki\Data\Contact;

use PHPUnit\Framework\TestCase;

/**
 * Class TypeTest
 * @package Wearesho\Bobra\Ubki\Tests\Data\Contact
 *
 * @internal
 */
class TypeTest extends TestCase
{
    public function testMobile(): void
    {
        $description = 'Мобильный телефон';
        $contact = Contact\Type::MOBILE($description);
        $this->assertEquals(Contact\Type::MOBILE, $contact->getValue());
        $this->assertEquals('MOBILE', $contact->getKey());
        $this->assertEquals($description, $contact->getDescription());
    }

    public function testWork(): void
    {
        $description = 'Рабочий телефон';
        $contact = Contact\Type::WORK($description);
        $this->assertEquals(Contact\Type::WORK, $contact->getValue());
        $this->assertEquals('WORK', $contact->getKey());
        $this->assertEquals($description, $contact->getDescription());
    }

    public function testHome(): void
    {
        $description = 'Домашний телефон телефон';
        $contact = Contact\Type::HOME($description);
        $this->assertEquals(Contact\Type::HOME, $contact->getValue());
        $this->assertEquals('HOME', $contact->getKey());
        $this->assertEquals($description, $contact->getDescription());
    }

    public function testFax(): void
    {
        $description = 'Факс';
        $contact = Contact\Type::FAX($description);
        $this->assertEquals(Contact\Type::FAX, $contact->getValue());
        $this->assertEquals('FAX', $contact->getKey());
        $this->assertEquals($description, $contact->getDescription());
    }

    public function testEmail(): void
    {
        $description = 'Почта';
        $contact = Contact\Type::EMAIL($description);
        $this->assertEquals(Contact\Type::EMAIL, $contact->getValue());
        $this->assertEquals('EMAIL', $contact->getKey());
        $this->assertEquals($description, $contact->getDescription());
    }
}
