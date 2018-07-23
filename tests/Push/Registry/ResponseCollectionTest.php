<?php

namespace Wearesho\Bobra\Ubki\Tests\Push\Registry;

use Carbon\Carbon;

use PHPUnit\Framework\TestCase;

use Wearesho\Bobra\Ubki\Push\Registry;

/**
 * Class ResponseCollectionTest
 *
 * @package Wearesho\Bobra\Ubki\Tests\Push\Registry
 */
class ResponseCollectionTest extends TestCase
{
    /** @var array */
    protected $responses;

    /** @var Registry\ResponseCollection */
    protected $testResponseCollection;

    protected function setUp(): void
    {
        parent::setUp();

        $reports = '<?xml version="1.0" encoding="UTF-8" ?>
<doc>
    <prot todo="REP" indate="20101010" idout="IN#0000018427" idalien="X000000000001"
          sessid="A1F593950A8F4562AE5A5DB1914D658A" state="r" oper="i" compid="1" item="ADDR" ertype="NW" crytical=""
          inn="2404005906"
          remark="OK. Язык: 1. Адрес: Україна Харьков Харьков Академика Ляпунова 10. Дата версии: 10.10.2010"/>
    <prot todo="REP" indate="20101010" idout="IN#0000018427" idalien="X000000000001"
          sessid="A1F593950A8F4562AE5A5DB1914D658A" state="r" oper="i" compid="1" item="DOC" ertype="NW" crytical=""
          inn="2404005906"
          remark="OK. Язык: 1. Серия док.: МТ 333333 Харьковский Украины в Харьковской обл.. Тип документа: 1."/>
    <prot todo="REP" indate="20101010" idout="IN#0000018427" idalien="X000000000001"
          sessid="A1F593950A8F4562AE5A5DB1914D658A" state="r" oper="i" compid="1" item="IDENT" ertype="NW" crytical=""
          inn="2404005906" remark="OK. Язык: 1. ФИО: ИВАНОВ ИВАН ИВАНОВИЧ АЛЕКСАНДРОВИЧ. Дата версии: 10.10.2010"/>
    <prot todo="REP" indate="20101010" idout="IN#0000018427" idalien="X000000000001"
          sessid="A1F593950A8F4562AE5A5DB1914D658A" state="r" oper="i" compid="2" item="CRDEAL" ertype="NW" crytical=""
          inn="2404005906" remark="OK IN. Референс договора: 111111. Месяц среза: 1. Год среза: 2010"/>
    <prot todo="REP" indate="20101010" idout="IN#0000018427" idalien="X000000000001"
          sessid="A1F593950A8F4562AE5A5DB1914D658A" state="r" oper="i" compid="10" item="CONT" ertype="NW" crytical=""
          inn="2404005906" remark="OK. Тип контакта: 3. Контакт: +380998881000. Дата версии: 10.10.2009"/>
</doc>';

        $this->testResponseCollection = new Registry\ResponseCollection($reports);
    }

    public function testAppend(): void
    {
        $response = new Registry\Rep\Response(
            Carbon::createFromFormat('Ymd', '20101010'),
            'IN#0000018427',
            'X000000000001',
            'A1F593950A8F4562AE5A5DB1914D658A',
            Registry\Response\State::PROCESSED(),
            Registry\Response\OperationType::TRANSFERRING(),
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
            'All items have to be instance of Wearesho\Bobra\Ubki\Push\Registry\ResponseInterface'
        );

        $response = 'Invalid value';
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

    public function testInvalidXml(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage("Unsupported response type: CRED");

        new Registry\ResponseCollection('<?xml version="1.0" encoding="UTF-8" ?>
<doc>
    <prot todo="CRED" indate="20101010" idout="IN#0000018427" idalien="X000000000001"
          sessid="A1F593950A8F4562AE5A5DB1914D658A" state="r" oper="i" compid="1" item="ADDR" ertype="NW" crytical=""
          inn="2404005906"
          remark="OK. Язык: 1. Адрес: Україна Харьков Харьков Академика Ляпунова 10. Дата версии: 10.10.2010"/>
</doc>');
    }
}
