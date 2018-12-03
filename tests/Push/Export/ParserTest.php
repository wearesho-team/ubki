<?php

namespace Wearesho\Bobra\Ubki\Tests\Push\Export;

use PHPUnit\Framework\TestCase;
use Wearesho\Bobra\Ubki;

/**
 * Class ParserTest
 * @package Wearesho\Bobra\Ubki\Tests\Push\Export
 * @coversDefaultClass \Wearesho\Bobra\Ubki\Push\Export\Parser
 * @internal
 */
class ParserTest extends TestCase
{
    /** @var Ubki\Push\Export\Parser */
    protected $fakeParser;

    protected function setUp(): void
    {
        $this->fakeParser = new Ubki\Push\Export\Parser();
    }

    public function testParseSimulatedResponse(): void
    {
        $response = '<?xml version="1.0" encoding="utf-8"?><doc>
<tech>
    <trace>
        <step name="INPROC" stm="1530780931.0051" ftm="1530780931.1068"/>
        <step name="VALID" stm="1530780931.1068" ftm="1530780931.116"/>
        <step name="INSERT" stm="1530780931.3003" ftm="1530780931.3004"/>
    </trace>
    <reqinfo reqid="IN#1231231233"/>
    <error errtype="" errtext=""/>
    <sentdatainfo reqid="IN#1231231233" state="er">
        <item compid="2" tag="DEALLIFE" attr="DLFLPAY" code="CRITICAL"
              msg="(`DEALLIFE`-Блок кредитных срезов)найден пустой атрибут(DLFLPAY-Признак исполн. платежа)"
              ok="" er=""/>
        <item compid="2" tag="DEALLIFE" attr="DLFLUSE" code="CRITICAL"
              msg="(DEALLIFE-Блок кредитных срезов)найден пустой атрибут(DLFLUSE-Признак наличия кредитного транша)"
              ok="2" er="3"/>
        <item compid="2" tag="CRDEAL" attr="INN" code="CRITICAL"
              msg="Ошибка, отсутствует блок (`DOC` - Блок документов) " ok="" er=""/>
        <item compid="1" tag="ADDR" attr="" code="CRITICAL" msg="Отсутствует блок адреса (тег (`ADDR` - Блок адресов) )"
              ok="4" er="5"/>
    </sentdatainfo>
</tech>
</doc>';

        $response = $this->fakeParser->parseResponse($response);

        $this->assertEquals(
            'IN#1231231233',
            $response->getUbkiId()
        );
        $this->assertEquals(
            'er',
            $response->getStatus()
        );
        $this->assertEquals(
            '',
            $response->getInternalError()
        );
        $this->assertEquals(
            '',
            $response->getInternalMessage()
        );
        $this->assertEquals(
            new Ubki\Push\Error\Collection([
                new Ubki\Push\Error\Entity(
                    2,
                    'DEALLIFE',
                    'DLFLPAY',
                    'CRITICAL',
                    '(`DEALLIFE`-Блок кредитных срезов)найден пустой атрибут(DLFLPAY-Признак исполн. платежа)',
                    0,
                    0
                ),
                new Ubki\Push\Error\Entity(
                    2,
                    'DEALLIFE',
                    'DLFLUSE',
                    'CRITICAL',
                    '(DEALLIFE-Блок кредитных срезов)найден пустой атрибут(DLFLUSE-Признак наличия кредитного транша)',
                    2,
                    3
                ),
                new Ubki\Push\Error\Entity(
                    2,
                    'CRDEAL',
                    'INN',
                    'CRITICAL',
                    'Ошибка, отсутствует блок (`DOC` - Блок документов) ',
                    0,
                    0
                ),
                new Ubki\Push\Error\Entity(
                    1,
                    'ADDR',
                    '',
                    'CRITICAL',
                    'Отсутствует блок адреса (тег (`ADDR` - Блок адресов) )',
                    4,
                    5
                ),
            ]),
            $response->getErrors()
        );
    }
}
