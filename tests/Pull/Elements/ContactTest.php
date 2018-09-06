<?php

namespace Wearesho\Bobra\Ubki\Tests\Pull\Elements;

use PHPUnit\Framework\TestCase;

use Wearesho\Bobra\Ubki\Pull\Elements\Contact;
use Wearesho\Bobra\Ubki\References\ContactType;

/**
 * Class ContactTest
 * @package Wearesho\Bobra\Ubki\Tests\Pull\Elements
 * @coversDefaultClass Contact
 * @internal
 */
class ContactTest extends TestCase
{
    protected const VALUE = 'testValue';

    /** @var Contact */
    protected $fakeContact;

    protected function setUp(): void
    {
        $this->fakeContact = new Contact(
            ContactType::MOBILE(),
            static::VALUE
        );
    }

    public function testJsonSerialize(): void
    {
        $this->assertArraySubset(
            [
                Contact::TYPE => ContactType::MOBILE()->getValue(),
                Contact::VALUE => static::VALUE,
            ],
            $this->fakeContact->jsonSerialize()
        );
    }

    public function testGetValue(): void
    {
        $this->assertEquals(
            static::VALUE,
            $this->fakeContact->getValue()
        );
    }

    public function testGetType(): void
    {
        $this->assertEquals(
            ContactType::MOBILE(),
            $this->fakeContact->getType()
        );
    }
}
