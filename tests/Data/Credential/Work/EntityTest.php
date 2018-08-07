<?php

namespace Wearesho\Bobra\Ubki\Tests\Data\Credential\Work;

use Carbon\Carbon;

use Wearesho\Bobra\Ubki\Data;
use Wearesho\Bobra\Ubki\Tests;

/**
 * Class EntityTest
 * @package Wearesho\Bobra\Ubki\Tests\Data\Credential\Work
 */
class EntityTest extends Tests\Extend\ElementTestCase
{
    protected const TAG = 'work';

    /** @var Data\Credential\Work\Entity */
    protected $element;

    protected function setUp(): void
    {
        $this->element = new Data\Credential\Work\Entity(
            Carbon::parse('2020-10-05'),
            Data\Language::RUS('русский'),
            'ergpou',
            'name',
            Data\Credential\Work\Rank::SPECIALIST(),
            1,
            200.00
        );
    }

    public function testGetters(): void
    {
        $this->assertEquals(1, $this->element->experience);
        $this->assertEquals(Data\Credential\Work\Rank::SPECIALIST(), $this->element->rank);
        $this->assertEquals('ergpou', $this->element->ergpou);
        $this->assertEquals(Data\Language::RUS('русский'), $this->element->language);
        $this->assertEquals(200.00, $this->element->income);
        $this->assertEquals('name', $this->element->name);
        $this->assertEquals(Carbon::parse('2020-10-05'), Carbon::instance($this->element->createdAt));
        $this->assertEquals('2020-10-05', Carbon::instance($this->element->createdAt)->toDateString());
    }

    public function testJsonSerialize(): void
    {
        $this->assertEquals(
            [
                'createdAt' => '2020-10-05',
                'language' => 'русский',
                'ergpou' => 'ergpou',
                'name' => 'name',
                'rank' => 'SPECIALIST',
                'experience' => 1,
                'income' => 200.00
            ],
            $this->element->jsonSerialize()
        );
    }
}
