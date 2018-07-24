<?php

namespace Wearesho\Bobra\Ubki\Tests\Type;

use Wearesho\Bobra\Ubki\Type\RequestInitiator;
use PHPUnit\Framework\TestCase;

/**
 * Class RequestInitiatorTest
 * @internal
 * @package Wearesho\Bobra\Ubki\Tests\Type
 */
class RequestInitiatorTest extends TestCase
{
    public function testPartner(): void
    {
        $description = 'партнер';
        $requestInitiator = RequestInitiator::PARTNER($description);
        $this->assertEquals(RequestInitiator::PARTNER, $requestInitiator->getValue());
        $this->assertEquals('PARTNER', $requestInitiator->getKey());
        $this->assertEquals($description, $requestInitiator->getDescription());
    }

    public function testCourt(): void
    {
        $description = 'суд';
        $requestInitiator = RequestInitiator::COURT($description);
        $this->assertEquals(RequestInitiator::COURT, $requestInitiator->getValue());
        $this->assertEquals('COURT', $requestInitiator->getKey());
        $this->assertEquals($description, $requestInitiator->getDescription());
    }

    public function testSki(): void
    {
        $description = 'СКИ';
        $requestInitiator = RequestInitiator::SKI($description);
        $this->assertEquals(RequestInitiator::SKI, $requestInitiator->getValue());
        $this->assertEquals('SKI', $requestInitiator->getKey());
        $this->assertEquals($description, $requestInitiator->getDescription());
    }

    public function testCertificatedSki(): void
    {
        $description = 'Проверенный СКИ';
        $requestInitiator = RequestInitiator::CERTIFICATED_SKI($description);
        $this->assertEquals(RequestInitiator::CERTIFICATED_SKI, $requestInitiator->getValue());
        $this->assertEquals('CERTIFICATED_SKI', $requestInitiator->getKey());
        $this->assertEquals($description, $requestInitiator->getDescription());
    }
}
