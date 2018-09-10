<?php

namespace Wearesho\Bobra\Ubki\Tests\Data;

use Carbon\Carbon;

use PHPUnit\Framework\TestCase;

use Wearesho\Bobra\Ubki\Data\Collections\Contacts;
use Wearesho\Bobra\Ubki\Data\ContactsInformation;
use Wearesho\Bobra\Ubki\Data\Elements;
use Wearesho\Bobra\Ubki\Data\Interfaces;
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
                    [
                        Interfaces\Contact::CREATED_AT => Carbon::parse(static::CREATED_AT),
                        Interfaces\Contact::VALUE => static::VALUE,
                        Interfaces\Contact::TYPE => ContactType::EMAIL(),
                        Interfaces\Contact::INN => static::INN,
                    ],
                    [
                        Interfaces\Contact::CREATED_AT => Carbon::parse(static::CREATED_AT),
                        Interfaces\Contact::VALUE => static::VALUE,
                        Interfaces\Contact::TYPE => ContactType::MOBILE(),
                        Interfaces\Contact::INN => static::INN,
                    ],
                ]
            ],
            $this->fakeContactsInformation->jsonSerialize()
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
