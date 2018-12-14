<?php

namespace Wearesho\Bobra\Ubki\Tests\Unit\Pull;

use Carbon\Carbon;
use PHPUnit\Framework\TestCase;
use Wearesho\Bobra\Ubki;

/**
 * Class RequestTest
 * @package Wearesho\Bobra\Ubki\Tests\Unit\Pull
 */
class RequestTest extends TestCase
{
    protected const DATE = '2018-03-12';
    protected const ID = 'testId';
    protected const INN = 'testInn';
    protected const NAME = 'testName';
    protected const PATRONYMIC = 'testPatronymic';
    protected const SURNAME = 'testSurname';
    protected const BIRTH_DATE = '2018-03-12';
    protected const VALUE = 'testValue';
    protected const SERIAL = 'testSerial';
    protected const NUMBER = 'testNumber';
    /** @var Ubki\Pull\Request */
    protected $fakeRequest;

    protected function setUp(): void
    {
        $this->fakeRequest = new Ubki\Pull\Request(
            new Ubki\Data\Elements\RequestData(
                Ubki\Dictionaries\RequestType::CREDIT_REPORT(),
                Ubki\Dictionaries\RequestReason::REQUEST_ONLINE_CREDIT(),
                Carbon::parse(static::DATE),
                static::ID,
                Ubki\Dictionaries\RequestInitiator::PARTNER()
            ),
            new Ubki\Pull\Elements\RequestContent(
                Ubki\Dictionaries\Language::RUS(),
                new Ubki\Pull\Elements\Identification(
                    static::INN,
                    static::NAME,
                    static::PATRONYMIC,
                    static::SURNAME,
                    Carbon::parse(static::BIRTH_DATE)
                ),
                new Ubki\Pull\Collections\Contacts([
                    new Ubki\Pull\Elements\Contact(
                        Ubki\Dictionaries\ContactType::MOBILE(),
                        static::VALUE
                    ),
                ]),
                new Ubki\Pull\Collections\Documents([
                    new Ubki\Pull\Elements\Document(
                        Ubki\Dictionaries\DocumentType::PASSPORT(),
                        static::SERIAL,
                        static::NUMBER
                    ),
                ])
            )
        );
    }

    public function testGetBody(): void
    {
        $this->assertEquals(
            new Ubki\Pull\Elements\RequestContent(
                Ubki\Dictionaries\Language::RUS(),
                new Ubki\Pull\Elements\Identification(
                    static::INN,
                    static::NAME,
                    static::PATRONYMIC,
                    static::SURNAME,
                    Carbon::parse(static::BIRTH_DATE)
                ),
                new Ubki\Pull\Collections\Contacts([
                    new Ubki\Pull\Elements\Contact(
                        Ubki\Dictionaries\ContactType::MOBILE(),
                        static::VALUE
                    ),
                ]),
                new Ubki\Pull\Collections\Documents([
                    new Ubki\Pull\Elements\Document(
                        Ubki\Dictionaries\DocumentType::PASSPORT(),
                        static::SERIAL,
                        static::NUMBER
                    ),
                ])
            ),
            $this->fakeRequest->getBody()
        );
    }

    public function testGetHead(): void
    {
        $this->assertEquals(
            new Ubki\Data\Elements\RequestData(
                Ubki\Dictionaries\RequestType::CREDIT_REPORT(),
                Ubki\Dictionaries\RequestReason::REQUEST_ONLINE_CREDIT(),
                Carbon::parse(static::DATE),
                static::ID,
                Ubki\Dictionaries\RequestInitiator::PARTNER()
            ),
            $this->fakeRequest->getHead()
        );
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Contacts, documents and identification attributes must be not null if reason is
     *                           CreditOnline
     */
    public function testCreditOnline(): void
    {
        new Ubki\Pull\Request(
            new Ubki\Data\Elements\RequestData(
                Ubki\Dictionaries\RequestType::CREDIT_REPORT(),
                Ubki\Dictionaries\RequestReason::REQUEST_ONLINE_CREDIT(),
                Carbon::parse(static::DATE),
                static::ID,
                Ubki\Dictionaries\RequestInitiator::PARTNER()
            ),
            new Ubki\Pull\Elements\RequestContent(
                Ubki\Dictionaries\Language::RUS(),
                new Ubki\Pull\Elements\Identification(static::INN)
            )
        );
    }
}
