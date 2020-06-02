<?php

namespace Wearesho\Bobra\Ubki\Tests\Data\Blocks;

use Carbon\Carbon;

use Wearesho\Bobra\Ubki\Tests\TestCase;

use Wearesho\Bobra\Ubki\Data\Blocks\ContactsInformation;
use Wearesho\Bobra\Ubki\Data\Collections\Contacts;
use Wearesho\Bobra\Ubki\Data\Elements;
use Wearesho\Bobra\Ubki\Dictionaries\ContactType;

/**
 * Class ContactsInformationTest
 * @package Wearesho\Bobra\Ubki\Tests\Data
 * @coversDefaultClass ContactsInformation
 * @internal
 */
class ContactsInformationTest extends TestCase
{
    protected const CREATED_AT = '2018-03-12';
    protected const VALUE = 'testValue';
    protected const INN = 'testInn';

    /** @var ContactsInformation */
    protected $fakeContactsInformation;

    protected function setUp(): void
    {
        $this->fakeContactsInformation = new ContactsInformation(
            new Contacts([
                new Elements\Contact(
                    Carbon::parse(static::CREATED_AT),
                    static::VALUE,
                    ContactType::EMAIL(),
                    static::INN
                ),
                new Elements\Contact(
                    Carbon::parse(static::CREATED_AT),
                    static::VALUE,
                    ContactType::MOBILE(),
                    static::INN
                )
            ])
        );
    }

    public function testJsonSerialize(): void
    {
        $this->assertArraySubset(
            [
                'contacts' => [
                    new Elements\Contact(
                        Carbon::parse(static::CREATED_AT),
                        static::VALUE,
                        ContactType::EMAIL(),
                        static::INN
                    ),
                    new Elements\Contact(
                        Carbon::parse(static::CREATED_AT),
                        static::VALUE,
                        ContactType::MOBILE(),
                        static::INN
                    ),
                ]
            ],
            $this->fakeContactsInformation->jsonSerialize()
        );
    }

    public function testTag(): void
    {
        $this->assertEquals(
            ContactsInformation::TAG,
            $this->fakeContactsInformation->tag()
        );
    }

    public function testGetContacts(): void
    {
        $this->assertEquals(
            new Contacts([
                new Elements\Contact(
                    Carbon::parse(static::CREATED_AT),
                    static::VALUE,
                    ContactType::EMAIL(),
                    static::INN
                ),
                new Elements\Contact(
                    Carbon::parse(static::CREATED_AT),
                    static::VALUE,
                    ContactType::MOBILE(),
                    static::INN
                )
            ]),
            $this->fakeContactsInformation->getContacts()
        );
    }
}
