<?php

namespace Wearesho\Bobra\Ubki\Tests\Data\CreditRegister;

use Carbon\Carbon;

use Wearesho\Bobra\Ubki\Data;
use Wearesho\Bobra\Ubki\Tests;

/**
 * Class EntityTest
 * @internal
 * @package Wearesho\Bobra\Ubki\Tests\Data\CreditRegister
 */
class EntityTest extends Tests\Extend\ElementTestCase
{
    protected const TAG = 'credres';

    /** @var Data\CreditRegister\Entity */
    protected $block;

    public function testGetDate(): void
    {
        $date = Carbon::instance($this->block->getDate());

        $this->assertEquals(
            Carbon::parse('2018-03-12'),
            $date
        );
        $this->assertEquals(
            '2018-03-12',
            $date->toDateString()
        );
    }

    public function testGetId(): void
    {
        $this->assertEquals(
            'identificator',
            $this->block->getId()
        );
    }

    public function testGetInn(): void
    {
        $this->assertEquals(
            '1234567890',
            $this->block->getInn()
        );
    }

    public function testGetDecision(): void
    {
        $this->assertEquals(
            Data\CreditRegister\Decision::POSITIVE(),
            $this->block->getDecision()
        );
    }

    public function testGetReason(): void
    {
        $this->assertEquals(
            1,
            $this->block->getReason()
        );
    }

    public function testGetOrganization(): void
    {
        $this->assertEquals(
            'BNK',
            $this->block->getOrganization()
        );
    }

    public function testJsonSerialize(): void
    {
        /** @noinspection PhpUnhandledExceptionInspection */
        $this->assertJsonSerialize([
            'date' => '2018-03-12',
            'inn' => '1234567890',
            'id' => 'identificator',
            'decision' => 'POSITIVE',
            'reason' => 1,
            'organization' => 'BNK'
        ]);
    }

    protected function setUp(): void
    {
        $this->block = new Data\CreditRegister\Entity(
            Carbon::parse('2018-03-12'),
            '1234567890',
            'identificator',
            Data\CreditRegister\Decision::POSITIVE(),
            1,
            'BNK'
        );
    }
}
