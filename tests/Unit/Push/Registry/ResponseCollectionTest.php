<?php

namespace Wearesho\Bobra\Ubki\Tests\Push\Registry;

use Carbon\Carbon;
use PHPUnit\Framework\TestCase;
use Wearesho\Bobra\Ubki\Push\Export\Request\Type;
use Wearesho\Bobra\Ubki\Push\Registry;

/**
 * Class ResponseCollectionTest
 * @package Wearesho\Bobra\Ubki\Tests\Push\Registry
 * @coversDefaultClass \Wearesho\Bobra\Ubki\Push\Registry\Response\Collection
 */
class ResponseCollectionTest extends TestCase
{
    /** @var array */
    protected $responses;

    /** @var Registry\Response\Collection */
    protected $testResponseCollection;

    protected function setUp(): void
    {
        parent::setUp();

        $this->testResponseCollection = new Registry\Response\Collection([
            new Registry\Rep\Response(
                Carbon::createFromFormat('Ymd', '20101010'),
                'IN#0000018427',
                'X000000000001',
                'A1F593950A8F4562AE5A5DB1914D658A',
                Registry\Response\State::PROCESSED(),
                Type::EXPORT(),
                1,
                'ADDR',
                'NW',
                '',
                '2404005906',
                'OK. Язык: 1. Адрес: Україна Харьков Харьков Академика Ляпунова 10. Дата версии: 10.10.2010'
            ),
            new Registry\Rep\Response(
                Carbon::createFromFormat('Ymd', '20101010'),
                'IN#0000018427',
                'X000000000001',
                'A1F593950A8F4562AE5A5DB1914D658A',
                Registry\Response\State::PROCESSED(),
                Type::EXPORT(),
                1,
                'DOC',
                'NW',
                '',
                '2404005906',
                'OK. Язык: 1. Серия док.: МТ 333333 Харьковский Украины в Харьковской обл.. Тип документа: 1.'
            ),
            new Registry\Rep\Response(
                Carbon::createFromFormat('Ymd', '20101010'),
                'IN#0000018427',
                'X000000000001',
                'A1F593950A8F4562AE5A5DB1914D658A',
                Registry\Response\State::PROCESSED(),
                Type::EXPORT(),
                1,
                'IDENT',
                'NW',
                '',
                '2404005906',
                'OK. Язык: 1. ФИО: ИВАНОВ ИВАН ИВАНОВИЧ АЛЕКСАНДРОВИЧ. Дата версии: 10.10.2010'
            ),
            new Registry\Rep\Response(
                Carbon::createFromFormat('Ymd', '20101010'),
                'IN#0000018427',
                'X000000000001',
                'A1F593950A8F4562AE5A5DB1914D658A',
                Registry\Response\State::PROCESSED(),
                Type::EXPORT(),
                2,
                'CRDEAL',
                'NW',
                '',
                '2404005906',
                'OK IN. Референс договора: 111111. Месяц среза: 1. Год среза: 2010'
            ),
            new Registry\Rep\Response(
                Carbon::createFromFormat('Ymd', '20101010'),
                'IN#0000018427',
                'X000000000001',
                'A1F593950A8F4562AE5A5DB1914D658A',
                Registry\Response\State::PROCESSED(),
                Type::EXPORT(),
                10,
                'CONT',
                'NW',
                '',
                '2404005906',
                'OK. Тип контакта: 3. Контакт: +380998881000. Дата версии: 10.10.2009'
            ),
        ]);
    }

    public function testAppend(): void
    {
        $response = new Registry\Rep\Response(
            Carbon::createFromFormat('Ymd', '20101010'),
            'IN#0000018427',
            'X000000000001',
            'A1F593950A8F4562AE5A5DB1914D658A',
            Registry\Response\State::PROCESSED(),
            Type::EXPORT(),
            10,
            'CONT',
            'NW',
            '',
            '2404005906',
            'OK. Тип контакта: 3. Контакт: +380998881000. Дата версии: 10.10.2009'
        );

        $this->testResponseCollection->append($response);

        $this->assertEquals($response, $this->testResponseCollection->offsetGet(5));
    }

    public function testInvalidValue(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage(
            'Element stdClass must be instance of Wearesho\Bobra\Ubki\Push\Registry\ResponseInterface'
        );

        $response = new \stdClass();
        /** @noinspection PhpParamsInspection */
        $this->testResponseCollection->offsetSet(1, $response);
    }

    public function testJsonSerialize(): void
    {
        $this->assertEquals(
            (array)$this->testResponseCollection,
            $this->testResponseCollection->jsonSerialize()
        );
    }
}
