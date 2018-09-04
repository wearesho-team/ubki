<?php

namespace Wearesho\Bobra\Ubki\Tests\Blocks;

use Carbon\Carbon;

use PHPUnit\Framework\TestCase;

use Wearesho\Bobra\Ubki\Data\Collections\Contacts;
use Wearesho\Bobra\Ubki\Data\ContactsInformation;
use Wearesho\Bobra\Ubki\Data\Elements\Contact;
use Wearesho\Bobra\Ubki\References\ContactType;

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
                new Contact(
                    Carbon::parse(static::CREATED_AT),
                    static::VALUE,
                    ContactType::EMAIL(),
                    static::INN
                ),
                new Contact(
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
                        'createdAt' => static::CREATED_AT,
                        'value' => static::VALUE,
                        'type' => ContactType::EMAIL()->getKey(),
                        'inn' => static::INN,
                    ],
                    [
                        'createdAt' => static::CREATED_AT,
                        'value' => static::VALUE,
                        'type' => ContactType::MOBILE()->getKey(),
                        'inn' => static::INN,
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
                new Contact(
                    Carbon::parse(static::CREATED_AT),
                    static::VALUE,
                    ContactType::EMAIL(),
                    static::INN
                ),
                new Contact(
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
