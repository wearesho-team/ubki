<?php

namespace Wearesho\Bobra\Ubki\Tests\Type;

use Wearesho\Bobra\Ubki\Type\DealStatus;
use PHPUnit\Framework\TestCase;

/**
 * class DealStatusTest
 * @package Wearesho\Bobra\Ubki\Tests\Type
 */
class DealStatusTest extends TestCase
{
    public function testProlonged(): void
    {
        $description = 'пролонгирвоана';
        $dealStatus = DealStatus::PROLONGED($description);
        $this->assertEquals(DealStatus::PROLONGED, $dealStatus->getValue());
        $this->assertEquals('PROLONGED', $dealStatus->getKey());
        $this->assertEquals($description, $dealStatus->getDescription());
    }

    public function testTermination(): void
    {
        $description = 'расторжение договора с бюро кредитных историй';
        $dealStatus = DealStatus::TERMINATION($description);
        $this->assertEquals(DealStatus::TERMINATION, $dealStatus->getValue());
        $this->assertEquals('TERMINATION', $dealStatus->getKey());
        $this->assertEquals($description, $dealStatus->getDescription());
    }

    public function testClose(): void
    {
        $description = 'закрыта';
        $dealStatus = DealStatus::CLOSE($description);
        $this->assertEquals(DealStatus::CLOSE, $dealStatus->getValue());
        $this->assertEquals('CLOSE', $dealStatus->getKey());
        $this->assertEquals($description, $dealStatus->getDescription());
    }

    public function testReplacement(): void
    {
        $description = 'замена заемщика, перевод долга';
        $dealStatus = DealStatus::REPLACEMENT($description);
        $this->assertEquals(DealStatus::REPLACEMENT, $dealStatus->getValue());
        $this->assertEquals('REPLACEMENT', $dealStatus->getKey());
        $this->assertEquals($description, $dealStatus->getDescription());
    }

    public function testOpen(): void
    {
        $description = 'открыта';
        $dealStatus = DealStatus::OPEN($description);
        $this->assertEquals(DealStatus::OPEN, $dealStatus->getValue());
        $this->assertEquals('OPEN', $dealStatus->getKey());
        $this->assertEquals($description, $dealStatus->getDescription());
    }

    public function testRestructured(): void
    {
        $description = 'реструктуризирована';
        $dealStatus = DealStatus::RESTRUCTURED($description);
        $this->assertEquals(DealStatus::RESTRUCTURED, $dealStatus->getValue());
        $this->assertEquals('RESTRUCTURED', $dealStatus->getKey());
        $this->assertEquals($description, $dealStatus->getDescription());
    }

    public function testSold(): void
    {
        $description = 'продана';
        $dealStatus = DealStatus::SOLD($description);
        $this->assertEquals(DealStatus::SOLD, $dealStatus->getValue());
        $this->assertEquals('SOLD', $dealStatus->getKey());
        $this->assertEquals($description, $dealStatus->getDescription());
    }

    public function testAnnulled(): void
    {
        $description = 'аннулирвоана';
        $dealStatus = DealStatus::ANNULLED($description);
        $this->assertEquals(DealStatus::ANNULLED, $dealStatus->getValue());
        $this->assertEquals('ANNULLED', $dealStatus->getKey());
        $this->assertEquals($description, $dealStatus->getDescription());
    }

    public function testLiquidation(): void
    {
        $description = 'ликвидация финансового учреждения';
        $dealStatus = DealStatus::LIQUIDATION($description);
        $this->assertEquals(DealStatus::LIQUIDATION, $dealStatus->getValue());
        $this->assertEquals('LIQUIDATION', $dealStatus->getKey());
        $this->assertEquals($description, $dealStatus->getDescription());
    }

    public function testWriteOff(): void
    {
        $description = 'списана';
        $dealStatus = DealStatus::WRITE_OFF($description);
        $this->assertEquals(DealStatus::WRITE_OFF, $dealStatus->getValue());
        $this->assertEquals('WRITE_OFF', $dealStatus->getKey());
        $this->assertEquals($description, $dealStatus->getDescription());
    }
}
