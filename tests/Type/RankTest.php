<?php

namespace Wearesho\Bobra\Ubki\Tests\Type;

use Wearesho\Bobra\Ubki\Type\Rank;

use PHPUnit\Framework\TestCase;

/**
 * class RankTest
 * @package Wearesho\Bobra\Ubki\Tests\Type
 */
class RankTest extends TestCase
{
    public function testSpecialist(): void
    {
        $description = 'Рабочий\специалист\исполнитель';
        $rank = Rank::SPECIALIST($description);
        $this->assertEquals(Rank::SPECIALIST, $rank->getValue());
        $this->assertEquals('SPECIALIST', $rank->getKey());
        $this->assertEquals($description, $rank->getDescription());
    }

    public function testDirector(): void
    {
        $description = 'Руководитель предприятия/организации';
        $rank = Rank::DIRECTOR($description);
        $this->assertEquals(Rank::DIRECTOR, $rank->getValue());
        $this->assertEquals('DIRECTOR', $rank->getKey());
        $this->assertEquals($description, $rank->getDescription());
    }

    public function testManager(): void
    {
        $description = 'Менеджер-управленец среднего звена';
        $rank = Rank::MANAGER($description);
        $this->assertEquals(Rank::MANAGER, $rank->getValue());
        $this->assertEquals('MANAGER', $rank->getKey());
        $this->assertEquals($description, $rank->getDescription());
    }

    public function testFreelancer(): void
    {
        $description = 'Частный предприниматель\фрилансер';
        $rank = Rank::FREELANCER($description);
        $this->assertEquals(Rank::FREELANCER, $rank->getValue());
        $this->assertEquals('FREELANCER', $rank->getKey());
        $this->assertEquals($description, $rank->getDescription());
    }
}
