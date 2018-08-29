<?php

namespace Wearesho\Bobra\Ubki\Tests\Blocks;

use Carbon\Carbon;

use PHPUnit\Framework\TestCase;

use Wearesho\Bobra\Ubki\Blocks\Collections\Contacts;
use Wearesho\Bobra\Ubki\Blocks\ContactsInformation;
use Wearesho\Bobra\Ubki\Blocks\Entities\Contact;
use Wearesho\Bobra\Ubki\References\ContactType;

/**
 * Class ContactsInformationTest
 * @package Wearesho\Bobra\Ubki\Tests\Blocks
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
