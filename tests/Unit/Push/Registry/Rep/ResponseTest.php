<?php

namespace Wearesho\Bobra\Ubki\Tests\Unit\Push\Registry\Rep;

use Carbon\Carbon;
use PHPUnit\Framework\TestCase;
use Wearesho\Bobra\Ubki;

/**
 * Class ResponseTest
 * @package Wearesho\Bobra\Ubki\Tests\Unit\Push\Registry\Rep
 * @coversDefaultClass \Wearesho\Bobra\Ubki\Push\Registry\Rep\Response
 */
class ResponseTest extends TestCase
{
    /** @var Ubki\Push\Registry\Rep\Response */
    protected $response;

    protected function setUp(): void
    {
        $this->response = new Ubki\Push\Registry\Rep\Response(
            Carbon::create(2018, 12, 12),
            'IN#0000018427',
            'X000000000001',
            'A1F593950A8F4562AE5A5DB1914D658A',
            Ubki\Push\Registry\Response\State::CREATED(),
            Ubki\Push\Export\Request\Type::EXPORT(),
            Ubki\Block::IDENTIFICATION,
            'IDENT',
            'NW',
            '',
            '1234567890',
            'Simple description of this status'
        );
    }

    public function testGetExportDate(): void
    {
        $this->assertEquals(
            Carbon::create(2018, 12, 12),
            Carbon::instance($this->response->getExportDate())
        );
        $this->assertEquals('2018-12-12', Carbon::instance($this->response->getExportDate())->toDateString());
    }

    public function testGetUbkiId(): void
    {
        $this->assertEquals('IN#0000018427', $this->response->getUbkiId());
    }

    public function testGetPartnerId(): void
    {
        $this->assertEquals('X000000000001', $this->response->getPartnerId());
    }

    public function testGetSessionId(): void
    {
        $this->assertEquals('A1F593950A8F4562AE5A5DB1914D658A', $this->response->getSessionId());
    }

    public function testGetState(): void
    {
        $this->assertTrue(
            Ubki\Push\Registry\Response\State::CREATED()
                ->equals($this->response->getState())
        );
    }

    public function testGetOperationType(): void
    {
        $this->assertTrue(
            Ubki\Push\Export\Request\Type::EXPORT()
                ->equals($this->response->getOperationType())
        );
    }

    public function testGetBlockId(): void
    {
        $this->assertEquals(Ubki\Block::IDENTIFICATION, $this->response->getBlockId());
    }

    public function testGetItem(): void
    {
        $this->assertEquals('IDENT', $this->response->getItem());
    }

    public function testGetType(): void
    {
        $this->assertEquals(Ubki\Push\Registry\Type::REP, $this->response->getType());
    }

    public function testGetError(): void
    {
        $this->assertEmpty($this->response->getErrorType());
    }

    public function testGetInn(): void
    {
        $this->assertEquals('1234567890', $this->response->getInn());
    }

    public function testGetRemark(): void
    {
        $this->assertEquals('Simple description of this status', $this->response->getRemark());
    }

    public function testGetJson(): void
    {
        $this->assertEquals(
            [
                'exportDate' => '2018-12-12',
                'ubkiId' => 'IN#0000018427',
                'partnerId' => 'X000000000001',
                'sessionId' => 'A1F593950A8F4562AE5A5DB1914D658A',
                'state' => 'CREATED',
                'operation' => 'EXPORT',
                'blockId' => 1,
                'item' => 'IDENT',
                'registry' => 'NW',
                'error' => '',
                'inn' => '1234567890',
                'remark' => 'Simple description of this status'
            ],
            $this->response->jsonSerialize()
        );
    }
}
