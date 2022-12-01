<?php

namespace Wearesho\Bobra\Ubki\Tests\Push\Registry;

use Carbon\Carbon;
use Wearesho\Bobra\Ubki;
use Wearesho\Bobra\Ubki\Tests\TestCase;

/**
 * Class ParserTest
 * @internal
 * @package Wearesho\Bobra\Ubki\Tests\Push\Registry
 */
class ParserTest extends TestCase
{
    public function testFetchResponses(): void
    {
        $registryXmlBody = "<?xml version=\"1.0\" encoding=\"utf-8\"?>
            <doc>
                <prot todo=\"REP\" indate=\"20101010\" idout=\"IN#0000018427\" 
                      idalien=\"X000000000001\"
                      sessid=\"A1F593950A8F4562AE5A5DB1914D658A\" state=\"r\" 
                      oper=\"i\" compid=\"1\" item=\"IDENT\" ertype=\"NW\" crytical=\"\"
                      inn=\"2404005906\" 
                      remark=\"OK. Язык: 1. ФИО: Зарінчук Любов Ярославівна. Дата версии: 23.05.2014\"/>
            </doc>";
        $parser = new Ubki\Push\Registry\Parser();

        /** @noinspection PhpUnhandledExceptionInspection */
        $responses = $parser->parseResponses($registryXmlBody);

        $this->assertEquals(
            new Ubki\Push\Registry\ResponseCollection([
                new Ubki\Push\Registry\Rep\Response(
                    Carbon::create(2010, 10, 10, 0, 0, 0),
                    'IN#0000018427',
                    'X000000000001',
                    'A1F593950A8F4562AE5A5DB1914D658A',
                    Ubki\Push\Registry\Response\State::PROCESSED(),
                    Ubki\Push\Registry\Response\OperationType::TRANSFERRING(),
                    1,
                    'IDENT',
                    'NW',
                    '',
                    '2404005906',
                    'OK. Язык: 1. ФИО: Зарінчук Любов Ярославівна. Дата версии: 23.05.2014'
                )
            ]),
            $responses
        );
    }

    public function testInvalidType(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage("Unsupported response type: CRED");

        $now = Carbon::now()->format('Ymd');
        $registryXmlBody = "<?xml version=\"1.0\" encoding=\"utf-8\"?>
            <doc>
                <prot todo=\"CRED\" indate=\"{$now}\" idout=\"IN#0000018427\" 
                      idalien=\"X000000000001\"
                      sessid=\"A1F593950A8F4562AE5A5DB1914D658A\" state=\"r\" 
                      oper=\"i\" compid=\"1\" item=\"IDENT\" ertype=\"NW\" crytical=\"\"
                      inn=\"2404005906\" 
                      remark=\"OK. Язык: 1. ФИО: Зарінчук Любов Ярославівна. Дата версии: 23.05.2014\"/>
            </doc>";
        $parser = new Ubki\Push\Registry\Parser();

        /** @noinspection PhpUnhandledExceptionInspection */
        $parser->parseResponses($registryXmlBody);
    }

    public function testEmptyDocument(): void
    {
        $this->expectException(\Exception::class);
        $registryXmlBody = "<?xml version=\"1.0\" encoding=\"utf-8\"?>
            <doc>
            </doc>";
        $this->expectExceptionMessage(
            "String have invalid content. Count of reports < 1;\nresponse body: " . $registryXmlBody
        );

        $parser = new Ubki\Push\Registry\Parser();

        $parser->parseResponses($registryXmlBody);
    }
}
