<?php

namespace Wearesho\Bobra\Ubki\Tests\Unit\Data\Blocks;

use Carbon\Carbon;
use PHPUnit\Framework\TestCase;
use Wearesho\Bobra\Ubki;

/**
 * Class ContactsInformationTest
 * @package Wearesho\Bobra\Ubki\Tests\Unit\Data\Blocks
 * @coversDefaultClass \Wearesho\Bobra\Ubki\Data\Blocks\ContactsInformation
 * @internal
 */
class ContactsInformationTest extends TestCase
{
    protected const CREATED_AT = '2018-03-12';
    protected const VALUE = 'testValue';
    protected const INN = 'testInn';

    /** @var Ubki\Data\Blocks\ContactsInformation */
    protected $fakeContactsInformation;

    protected function setUp(): void
    {
        $this->fakeContactsInformation = new Ubki\Data\Blocks\ContactsInformation(
            new Ubki\Data\Collections\Contacts([
                new Ubki\Data\Elements\Contact(
                    Carbon::parse(static::CREATED_AT),
                    static::VALUE,
                    Ubki\Dictionaries\ContactType::EMAIL(),
                    static::INN
                ),
                new Ubki\Data\Elements\Contact(
                    Carbon::parse(static::CREATED_AT),
                    static::VALUE,
                    Ubki\Dictionaries\ContactType::MOBILE(),
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
                    new Ubki\Data\Elements\Contact(
                        Carbon::parse(static::CREATED_AT),
                        static::VALUE,
                        Ubki\Dictionaries\ContactType::EMAIL(),
                        static::INN
                    ),
                    new Ubki\Data\Elements\Contact(
                        Carbon::parse(static::CREATED_AT),
                        static::VALUE,
                        Ubki\Dictionaries\ContactType::MOBILE(),
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
            Ubki\Data\Blocks\ContactsInformation::TAG,
            $this->fakeContactsInformation->tag()
        );
    }

    public function testGetContacts(): void
    {
        $this->assertEquals(
            new Ubki\Data\Collections\Contacts([
                new Ubki\Data\Elements\Contact(
                    Carbon::parse(static::CREATED_AT),
                    static::VALUE,
                    Ubki\Dictionaries\ContactType::EMAIL(),
                    static::INN
                ),
                new Ubki\Data\Elements\Contact(
                    Carbon::parse(static::CREATED_AT),
                    static::VALUE,
                    Ubki\Dictionaries\ContactType::MOBILE(),
                    static::INN
                )
            ]),
            $this->fakeContactsInformation->getContacts()
        );
    }
}
