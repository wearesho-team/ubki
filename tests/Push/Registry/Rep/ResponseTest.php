<?php

namespace Wearesho\Bobra\Ubki\Tests\Push\Registry\Rep;

use PHPUnit\Framework\TestCase;

use Wearesho\Bobra\Ubki\Push\Registry;

/**
 * Class ResponseTest
 *
 * @package Wearesho\Bobra\Ubki\Tests\Push\Registry\Rep
 */
class ResponseTest extends TestCase
{
    public function testResponse(): void
    {
        $indate = \DateTime::createFromFormat('Ymd', '20181212');

        $response = new Registry\Rep\Response(
            $indate,
            'qweqwe',
            'asdasd',
            '123qwe',
            'i',
            'i',
            1,
            'IDENT',
            'NW',
            '',
            '123123123',
            'Some description'
        );

        $this->assertEquals(Registry\Type::REP, $response->getTodo());
        $this->assertEquals($indate, $response->getIndate());
        $this->assertEquals('qweqwe', $response->getIdout());
        $this->assertEquals('asdasd', $response->getIdalien());
        $this->assertEquals('123qwe', $response->getSessid());
        $this->assertEquals(Registry\Response\State::CREATED, $response->getState());
        $this->assertEquals(Registry\Response\OperationType::TRANSFERRING, $response->getOper());
        $this->assertEquals(1, $response->getCompid());
        $this->assertEquals('IDENT', $response->getItem());
        $this->assertEquals('NW', $response->getRegistryType());
        $this->assertEmpty($response->getErrorType());
        $this->assertEquals('123123123', $response->getInn());
        $this->assertEquals('Some description', $response->getRemark());
    }
}
