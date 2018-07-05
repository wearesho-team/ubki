<?php

namespace Wearesho\Bobra\Ubki\Tests\Reestr\Bil;

use PHPUnit\Framework\TestCase;

use Wearesho\Bobra\Ubki\Reestr\Bil\Response;

/**
 * Class ResponseTest
 *
 * @package Wearesho\Bobra\Ubki\Tests\Reestr\Bil
 */
class ResponseTest extends TestCase
{
    public function testGets(): void
    {
        $response = new Response(
            'BIL',
            \DateTime::createFromFormat('Ymd', '2018-06-06'),
            'unique_idout',
            'unique_idalien',
            'unique_sessid',
            'e',
            'i',
            1,
            'IDENT',
            10,
            1,
            2,
            3,
            4,
            5,
            6
        );

        $this->assertEquals('BIL', $response->getTodo());
        $this->assertEquals('20180606', $response->getIndate()->format('Ymd'));
        $this->assertEquals('unique_idout', $response->getIdout());
        $this->assertEquals('unique_sessid', $response->getSessid());
        $this->assertEquals(Response::STATE_SQL_ERROR, $response->getState());
        $this->assertEquals(true, $response->isStateError());
        $this->assertEquals(false, $response->isStateBlocked());
        $this->assertEquals(false, $response->isStateCreated());
        $this->assertEquals(false, $response->isStateProcessed());
        $this->assertEquals(false, $response->isStateTransmitted());
        $this->assertEquals('i', $response->getOper());
        $this->assertEquals(1, $response->getCompid());
        $this->assertEquals(10, $response->getAl());
        $this->assertEquals(1, $response->getNw());
        $this->assertEquals(2, $response->getEd());
        $this->assertEquals(3, $response->getEr());
        $this->assertEquals(4, $response->getDb());
        $this->assertEquals(5, $response->getLb());
        $this->assertEquals(6, $response->getDl());
        $this->assertEquals(true, $response->getAl() >= $response->getNw());
        $this->assertEquals(true, $response->getAl() >= $response->getEd());
        $this->assertEquals(true, $response->getAl() >= $response->getDb());
        $this->assertEquals(true, $response->getAl() >= $response->getLb());
        $this->assertEquals(true, $response->getAl() >= $response->getDl());
    }
}
