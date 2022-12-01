<?php

namespace Wearesho\Bobra\Ubki\Tests\Push\Registry\Rep;

use Carbon\Carbon;
use Wearesho\Bobra\Ubki\Tests\TestCase;
use Wearesho\Bobra\Ubki\Data\Blocks\Identification;
use Wearesho\Bobra\Ubki\Push\Registry;

/**
 * Class ResponseTest
 *
 * @package Wearesho\Bobra\Ubki\Tests\Push\Registry\Rep
 */
class ResponseTest extends TestCase
{
    /** @var Registry\Rep\Response */
    protected $response;

    protected function setUp(): void
    {
        $this->response = new Registry\Rep\Response(
            Carbon::create(2018, 12, 12),
            'IN#0000018427',
            'X000000000001',
            'A1F593950A8F4562AE5A5DB1914D658A',
            Registry\Response\State::CREATED(),
            Registry\Response\OperationType::TRANSFERRING(),
            Identification::ID,
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
        $this->assertEquals(
            '2018-12-12',
            Carbon::instance($this->response->getExportDate())->toDateString()
        );
    }

    public function testGetUbkiId(): void
    {
        $this->assertEquals(
            'IN#0000018427',
            $this->response->getUbkiId()
        );
    }

    public function testGetPartnerId(): void
    {
        $this->assertEquals(
            'X000000000001',
            $this->response->getPartnerId()
        );
    }

    public function testGetSessionId(): void
    {
        $this->assertEquals(
            'A1F593950A8F4562AE5A5DB1914D658A',
            $this->response->getSessionId()
        );
    }

    public function testGetState(): void
    {
        $this->assertTrue(
            Registry\Response\State::CREATED()
                ->equals($this->response->getState())
        );
    }

    public function testGetOperationType(): void
    {
        $this->assertTrue(
            Registry\Response\OperationType::TRANSFERRING()
                ->equals($this->response->getOperationType())
        );
    }

    public function testGetBlockId(): void
    {
        $this->assertEquals(
            Identification::ID,
            $this->response->getBlockId()
        );
    }

    public function testGetItem(): void
    {
        $this->assertEquals(
            'IDENT',
            $this->response->getItem()
        );
    }

    public function testGetType(): void
    {
        $this->assertEquals(
            Registry\Type::REP,
            $this->response->getType()
        );
    }

    public function testGetError(): void
    {
        $error = $this->response->getErrorType();

        $this->assertTrue(
            empty($error)
            || is_null($error)
        );
    }

    public function testGetInn(): void
    {
        $this->assertEquals(
            '1234567890',
            $this->response->getInn()
        );
    }

    public function testGetRemark(): void
    {
        $this->assertEquals(
            'Simple description of this status',
            $this->response->getRemark()
        );
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
                'operation' => 'TRANSFERRING',
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
