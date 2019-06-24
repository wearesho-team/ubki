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
            new Ubki\Pull\Request\Head(
                Ubki\Pull\Report\Type::CREDIT_REPORT(),
                Ubki\Dictionary\RequestReason::REQUEST_ONLINE_CREDIT(),
                Carbon::parse(static::DATE),
                static::ID,
                Ubki\Dictionary\RequestInitiator::PARTNER()
            ),
            new Ubki\Pull\Element\RequestContent(
                Ubki\Dictionary\Language::RUS(),
                new Ubki\Pull\Element\Identification(
                    static::INN,
                    static::NAME,
                    static::PATRONYMIC,
                    static::SURNAME,
                    Carbon::parse(static::BIRTH_DATE)
                ),
                new Ubki\Pull\Collection\Contact([
                    new Ubki\Pull\Element\Contact(
                        Ubki\Dictionary\Contact::MOBILE(),
                        static::VALUE
                    ),
                ]),
                new Ubki\Pull\Collection\Document([
                    new Ubki\Pull\Element\Document(
                        Ubki\Dictionary\Document::PASSPORT(),
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
            new Ubki\Pull\Element\RequestContent(
                Ubki\Dictionary\Language::RUS(),
                new Ubki\Pull\Element\Identification(
                    static::INN,
                    static::NAME,
                    static::PATRONYMIC,
                    static::SURNAME,
                    Carbon::parse(static::BIRTH_DATE)
                ),
                new Ubki\Pull\Collection\Contact([
                    new Ubki\Pull\Element\Contact(
                        Ubki\Dictionary\Contact::MOBILE(),
                        static::VALUE
                    ),
                ]),
                new Ubki\Pull\Collection\Document([
                    new Ubki\Pull\Element\Document(
                        Ubki\Dictionary\Document::PASSPORT(),
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
            new Ubki\Pull\Request\Head(
                Ubki\Pull\Report\Type::CREDIT_REPORT(),
                Ubki\Dictionary\RequestReason::REQUEST_ONLINE_CREDIT(),
                Carbon::parse(static::DATE),
                static::ID,
                Ubki\Dictionary\RequestInitiator::PARTNER()
            ),
            $this->fakeRequest->getHead()
        );
    }

    public function testCreditOnline(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage("Contact, documents and identification attributes required if reason is REQUEST_ONLINE_CREDIT"); //phpcs:ignore

        new Ubki\Pull\Request(
            new Ubki\Pull\Request\Head(
                Ubki\Pull\Report\Type::CREDIT_REPORT(),
                Ubki\Dictionary\RequestReason::REQUEST_ONLINE_CREDIT(),
                Carbon::parse(static::DATE),
                static::ID,
                Ubki\Dictionary\RequestInitiator::PARTNER()
            ),
            new Ubki\Pull\Element\RequestContent(
                Ubki\Dictionary\Language::RUS(),
                new Ubki\Pull\Element\Identification(static::INN),
                new Ubki\Pull\Collection\Contact(),
                new Ubki\Pull\Collection\Document()
            )
        );
    }
}
