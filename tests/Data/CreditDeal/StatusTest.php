<?php

namespace Wearesho\Bobra\Ubki\Tests\Data\CreditDeal;

use Wearesho\Bobra\Ubki\Data\CreditDeal\Status;

use PHPUnit\Framework\TestCase;

/**
 * class StatusTest
 * @package Wearesho\Bobra\Ubki\Tests\Data\CreditDeal
 */
class StatusTest extends TestCase
{
    public function testProlonged(): void
    {
        $description = 'пролонгирвоана';
        $dealStatus = Status::PROLONGED($description);
        $this->assertEquals(Status::PROLONGED, $dealStatus->getValue());
        $this->assertEquals('PROLONGED', $dealStatus->getKey());
        $this->assertEquals($description, $dealStatus->getDescription());
    }

    public function testTermination(): void
    {
        $description = 'расторжение договора с бюро кредитных историй';
        $dealStatus = Status::TERMINATION($description);
        $this->assertEquals(Status::TERMINATION, $dealStatus->getValue());
        $this->assertEquals('TERMINATION', $dealStatus->getKey());
        $this->assertEquals($description, $dealStatus->getDescription());
    }

    public function testClose(): void
    {
        $description = 'закрыта';
        $dealStatus = Status::CLOSE($description);
        $this->assertEquals(Status::CLOSE, $dealStatus->getValue());
        $this->assertEquals('CLOSE', $dealStatus->getKey());
        $this->assertEquals($description, $dealStatus->getDescription());
    }

    public function testReplacement(): void
    {
        $description = 'замена заемщика, перевод долга';
        $dealStatus = Status::REPLACEMENT($description);
        $this->assertEquals(Status::REPLACEMENT, $dealStatus->getValue());
        $this->assertEquals('REPLACEMENT', $dealStatus->getKey());
        $this->assertEquals($description, $dealStatus->getDescription());
    }

    public function testOpen(): void
    {
        $description = 'открыта';
        $dealStatus = Status::OPEN($description);
        $this->assertEquals(Status::OPEN, $dealStatus->getValue());
        $this->assertEquals('OPEN', $dealStatus->getKey());
        $this->assertEquals($description, $dealStatus->getDescription());
    }

    public function testRestructured(): void
    {
        $description = 'реструктуризирована';
        $dealStatus = Status::RESTRUCTURED($description);
        $this->assertEquals(Status::RESTRUCTURED, $dealStatus->getValue());
        $this->assertEquals('RESTRUCTURED', $dealStatus->getKey());
        $this->assertEquals($description, $dealStatus->getDescription());
    }

    public function testSold(): void
    {
        $description = 'продана';
        $dealStatus = Status::SOLD($description);
        $this->assertEquals(Status::SOLD, $dealStatus->getValue());
        $this->assertEquals('SOLD', $dealStatus->getKey());
        $this->assertEquals($description, $dealStatus->getDescription());
    }

    public function testAnnulled(): void
    {
        $description = 'аннулирвоана';
        $dealStatus = Status::ANNULLED($description);
        $this->assertEquals(Status::ANNULLED, $dealStatus->getValue());
        $this->assertEquals('ANNULLED', $dealStatus->getKey());
        $this->assertEquals($description, $dealStatus->getDescription());
    }

    public function testLiquidation(): void
    {
        $description = 'ликвидация финансового учреждения';
        $dealStatus = Status::LIQUIDATION($description);
        $this->assertEquals(Status::LIQUIDATION, $dealStatus->getValue());
        $this->assertEquals('LIQUIDATION', $dealStatus->getKey());
        $this->assertEquals($description, $dealStatus->getDescription());
    }

    public function testWriteOff(): void
    {
        $description = 'списана';
        $dealStatus = Status::WRITE_OFF($description);
        $this->assertEquals(Status::WRITE_OFF, $dealStatus->getValue());
        $this->assertEquals('WRITE_OFF', $dealStatus->getKey());
        $this->assertEquals($description, $dealStatus->getDescription());
    }
}
