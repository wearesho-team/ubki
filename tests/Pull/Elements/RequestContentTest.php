<?php

namespace Wearesho\Bobra\Ubki\Tests\Pull\Elements;

use Carbon\Carbon;
use PHPUnit\Framework\TestCase;

use Wearesho\Bobra\Ubki\Pull\Collections;
use Wearesho\Bobra\Ubki\Pull\Elements;
use Wearesho\Bobra\Ubki\References;

/**
 * Class RequestContentTest
 * @package Wearesho\Bobra\Ubki\Tests\Pull\Elements
 * @coversDefaultClass Elements\RequestContent
 * @internal
 */
class RequestContentTest extends TestCase
{
    protected const INN = 'testInn';
    protected const NAME = 'testName';
    protected const PATRONYMIC = 'testPatronymic';
    protected const SURNAME = 'testSurname';
    protected const BIRTH_DATE = '2018-03-12';
    protected const VALUE = 'testValue';
    protected const SERIAL = 'testSerial';
    protected const NUMBER = 'testNumber';

    /** @var Elements\RequestContent */
    protected $fakeRequestContent;

    protected function setUp(): void
    {
        $this->fakeRequestContent = new Elements\RequestContent(
            References\Language::RUS(),
            new Elements\Identification(
                static::INN,
                static::NAME,
                static::PATRONYMIC,
                static::SURNAME,
                Carbon::parse(static::BIRTH_DATE)
            ),
            new Collections\Contacts([
                new Elements\Contact(
                    References\ContactType::MOBILE(),
                    static::VALUE
                ),
            ]),
            new Collections\Documents([
                new Elements\Document(
                    References\DocumentType::PASSPORT(),
                    static::SERIAL,
                    static::NUMBER
                ),
            ])
        );
    }

    public function testJsonSerialize(): void
    {
        $this->assertArraySubset(
            [
                Elements\Identification::TAG => [
                    Elements\Identification::INN => static::INN,
                    Elements\Identification::NAME => static::NAME,
                    Elements\Identification::PATRONYMIC => static::PATRONYMIC,
                    Elements\Identification::SURNAME => static::SURNAME,
                    Elements\Identification::BIRTH_DATE => static::BIRTH_DATE,
                ],
                Collections\Contacts::TAG => [
                    [
                        Elements\Contact::TYPE => References\ContactType::MOBILE()->getValue(),
                        Elements\Contact::VALUE => static::VALUE,
                    ]
                ],
                Collections\Documents::TAG => [
                    [
                        Elements\Document::TYPE => References\DocumentType::PASSPORT()->getValue(),
                        Elements\Document::SERIAL => static::SERIAL,
                        Elements\Document::NUMBER => static::NUMBER,
                    ]
                ],
            ],
            $this->fakeRequestContent->jsonSerialize()
        );
    }

    public function testGetIdentification(): void
    {
        $this->assertEquals(
            new Elements\Identification(
                static::INN,
                static::NAME,
                static::PATRONYMIC,
                static::SURNAME,
                Carbon::parse(static::BIRTH_DATE)
            ),
            $this->fakeRequestContent->getIdentification()
        );
    }

    public function testGetLanguage(): void
    {
        $this->assertEquals(
            References\Language::RUS(),
            $this->fakeRequestContent->getLanguage()
        );
    }

    public function testGetDocuments(): void
    {
        $this->assertEquals(
            new Collections\Documents([
                new Elements\Document(
                    References\DocumentType::PASSPORT(),
                    static::SERIAL,
                    static::NUMBER
                )
            ]),
            $this->fakeRequestContent->getDocuments()
        );
    }

    public function testGetContacts(): void
    {
        $this->assertEquals(
            new Collections\Contacts([
                new Elements\Contact(
                    References\ContactType::MOBILE(),
                    static::VALUE
                ),
            ]),
            $this->fakeRequestContent->getContacts()
        );
    }
}
