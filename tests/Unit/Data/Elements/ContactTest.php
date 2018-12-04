<?php

namespace Wearesho\Bobra\Ubki\Tests\Unit\Data\Elements;

use Carbon\Carbon;
use PHPUnit\Framework\TestCase;
use Wearesho\Bobra\Ubki;

/**
 * Class ContactTest
 * @package Wearesho\Bobra\Ubki\Tests\Unit\Data\Elements
 * @coversDefaultClass \Wearesho\Bobra\Ubki\Data\Elements\Contact
 * @internal
 */
class ContactTest extends TestCase
{
    protected const CREATED_AT = '2018-03-12';
    protected const VALUE = 'testValue';
    protected const INN = 'testInn';

    /** @var Ubki\Data\Elements\Contact */
    protected $fakeContact;

    protected function setUp(): void
    {
        $this->fakeContact = new Ubki\Data\Elements\Contact(
            Carbon::parse(static::CREATED_AT),
            static::VALUE,
            Ubki\Dictionaries\ContactType::FAX(),
            static::INN
        );
    }

    public function testJsonSerialize(): void
    {
        $this->assertArraySubset(
            [
                Ubki\Data\Interfaces\Contact::CREATED_AT => Carbon::parse(static::CREATED_AT),
                Ubki\Data\Interfaces\Contact::VALUE => static::VALUE,
                Ubki\Data\Interfaces\Contact::TYPE => Ubki\Dictionaries\ContactType::FAX(),
                Ubki\Data\Interfaces\Contact::INN => static::INN
            ],
            $this->fakeContact->jsonSerialize()
        );
    }

    public function testTag(): void
    {
        $this->assertEquals(
            Ubki\Data\Interfaces\Contact::TAG,
            $this->fakeContact->tag()
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
            Ubki\Dictionaries\ContactType::FAX(),
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
