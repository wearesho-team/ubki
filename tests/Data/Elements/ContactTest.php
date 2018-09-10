<?php

namespace Wearesho\Bobra\Ubki\Tests\Data\Elements;

use Carbon\Carbon;

use PHPUnit\Framework\TestCase;

use Wearesho\Bobra\Ubki\Data\Elements\Contact;
use Wearesho\Bobra\Ubki\Data\Interfaces;
use Wearesho\Bobra\Ubki\Dictionaries\ContactType;

/**
 * Class ContactTest
 * @package Wearesho\Bobra\Ubki\Tests\Data\Elements
 * @coversDefaultClass Contact
 * @internal
 */
class ContactTest extends TestCase
{
    protected const CREATED_AT = '2018-03-12';
    protected const VALUE = 'testValue';
    protected const INN = 'testInn';

    /** @var Contact */
    protected $fakeContact;

    protected function setUp(): void
    {
        $this->fakeContact = new Contact(
            Carbon::parse(static::CREATED_AT),
            static::VALUE,
            ContactType::FAX(),
            static::INN
        );
    }

    public function testJsonSerialize(): void
    {
        $this->assertArraySubset(
            [
                Interfaces\Contact::CREATED_AT => Carbon::parse(static::CREATED_AT),
                Interfaces\Contact::VALUE => static::VALUE,
                Interfaces\Contact::TYPE => ContactType::FAX(),
                Interfaces\Contact::INN => static::INN
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

    public function testGetCreatedAt(): void
    {
        $this->assertEquals(
            static::CREATED_AT,
            Carbon::instance($this->fakeContact->getCreatedAt())->toDateString()
        );
    }

    public function testGetType(): void
    {
        $this->assertEquals(
            ContactType::FAX(),
            $this->fakeContact->getType()
        );
    }

    public function testGetInn(): void
    {
        $this->assertEquals(
            static::INN,
            $this->fakeContact->getInn()
        );
    }
}
