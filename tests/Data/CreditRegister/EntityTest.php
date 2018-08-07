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
    protected $element;

    protected function setUp(): void
    {
        $this->element = new Data\CreditRegister\Entity(
            Carbon::parse('2018-03-12'),
            '1234567890',
            'identificator',
            Data\CreditRegister\Decision::POSITIVE(),
            1,
            'BNK'
        );
    }

    public function testGetters(): void
    {
        $this->assertEquals(Carbon::parse('2018-03-12'), Carbon::instance($this->element->date));
        $this->assertEquals('2018-03-12', Carbon::instance($this->element->date)->toDateString());
        $this->assertEquals('identificator', $this->element->id);
        $this->assertEquals('1234567890', $this->element->inn);
        $this->assertEquals(Data\CreditRegister\Decision::POSITIVE(), $this->element->decision);
        $this->assertEquals(1, $this->element->reason);
        $this->assertEquals('BNK', $this->element->organization);
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
}
