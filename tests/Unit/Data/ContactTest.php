<?php

declare(strict_types=1);

namespace Wearesho\Bobra\Ubki\Tests\Unit\Data;

use Carbon\Carbon;
use Wearesho\Bobra\Ubki;

/**
 * Class ContactTest
 * @package Wearesho\Bobra\Ubki\Tests\Unit\Data
 */
class ContactTest extends Ubki\Tests\Unit\TestCase
{
    protected const CREATED_AT = '2018-03-12';
    protected const VALUE = 'value';
    protected const INN = '1234567890';

    /** @var Ubki\Data\Contact */
    protected $contact;

    protected function setUp(): void
    {
        $this->contact = new Ubki\Data\Contact(
            Carbon::parse(static::CREATED_AT),
            static::VALUE,
            Ubki\Dictionary\Contact::HOME(),
            static::INN
        );
    }

    public function testTag(): void
    {
        $this->assertEquals('cont', $this->contact::tag());
    }

    public function testJsonSerialize(): void
    {
        $this->assertEquals(
            [
                'createdAt' => Carbon::parse(static::CREATED_AT),
                'value' => static::VALUE,
                'type' => Ubki\Dictionary\Contact::HOME(),
                'inn' => static::INN
            ],
            $this->contact->jsonSerialize()
        );
    }

    public function testGetCreatedAt(): void
    {
        $this->assertEquals(Carbon::parse(static::CREATED_AT), $this->contact->getCreatedAt());
    }

    public function testGetValue(): void
    {
        $this->assertEquals(static::VALUE, $this->contact->getValue());
    }

    public function testGetType(): void
    {
        $this->assertEquals(Ubki\Dictionary\Contact::HOME, $this->contact->getType()->getValue());
    }

    public function testGetInn(): void
    {
        $this->assertEquals(static::INN, $this->contact->getInn());
    }

    public function testInvalidInn(): void
    {
        $invalidInn = 'invalidInn';
        $this->expectValidationException($invalidInn, Ubki\Validator::INN());

        new Ubki\Data\Contact(
            Carbon::parse(static::CREATED_AT),
            static::VALUE,
            Ubki\Dictionary\Contact::HOME(),
            $invalidInn
        );
    }
}
