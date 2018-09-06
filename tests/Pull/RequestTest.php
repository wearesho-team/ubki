<?php

namespace Wearesho\Bobra\Ubki\Tests\Pull;

use Carbon\Carbon;

use PHPUnit\Framework\TestCase;

use Wearesho\Bobra\Ubki\Blocks\Entities\RequestData;
use Wearesho\Bobra\Ubki\Pull;
use Wearesho\Bobra\Ubki\References;

/**
 * Class RequestTest
 * @package Wearesho\Bobra\Ubki\Tests\Pull
 * @coversDefaultClass Pull\Request
 * @internal
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

    /** @var Pull\Request */
    protected $fakeRequest;

    protected function setUp(): void
    {
        $this->fakeRequest = new Pull\Request(
            new RequestData(
                References\RequestType::CREDIT_REPORT(),
                References\RequestReason::CREDIT_ONLINE(),
                Carbon::parse(static::DATE),
                static::ID,
                References\RequestInitiator::PARTNER()
            ),
            new Pull\Elements\RequestContent(
                References\Language::RUS(),
                new Pull\Elements\Identification(
                    static::INN,
                    static::NAME,
                    static::PATRONYMIC,
                    static::SURNAME,
                    Carbon::parse(static::BIRTH_DATE)
                ),
                new Pull\Collections\Contacts([
                    new Pull\Elements\Contact(
                        References\ContactType::MOBILE(),
                        static::VALUE
                    ),
                ]),
                new Pull\Collections\Documents([
                    new Pull\Elements\Document(
                        References\DocumentType::PASSPORT(),
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
            new Pull\Elements\RequestContent(
                References\Language::RUS(),
                new Pull\Elements\Identification(
                    static::INN,
                    static::NAME,
                    static::PATRONYMIC,
                    static::SURNAME,
                    Carbon::parse(static::BIRTH_DATE)
                ),
                new Pull\Collections\Contacts([
                    new Pull\Elements\Contact(
                        References\ContactType::MOBILE(),
                        static::VALUE
                    ),
                ]),
                new Pull\Collections\Documents([
                    new Pull\Elements\Document(
                        References\DocumentType::PASSPORT(),
                        static::SERIAL,
                        static::NUMBER
                    ),
                ])
            ),
            $this->fakeRequest->getBody()
        );
    }

    public function testJsonSerialize(): void
    {
        $this->assertEmpty($this->fakeRequest->jsonSerialize());
    }

    public function testGetHead(): void
    {
        $this->assertEquals(
            new RequestData(
                References\RequestType::CREDIT_REPORT(),
                References\RequestReason::CREDIT_ONLINE(),
                Carbon::parse(static::DATE),
                static::ID,
                References\RequestInitiator::PARTNER()
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
        new Pull\Request(
            new RequestData(
                References\RequestType::CREDIT_REPORT(),
                References\RequestReason::CREDIT_ONLINE(),
                Carbon::parse(static::DATE),
                static::ID,
                References\RequestInitiator::PARTNER()
            ),
            new Pull\Elements\RequestContent(
                References\Language::RUS(),
                new Pull\Elements\Identification(static::INN)
            )
        );
    }
}
