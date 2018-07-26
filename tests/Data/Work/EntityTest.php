<?php

namespace Wearesho\Bobra\Ubki\Tests\Data\Work;

use Carbon\Carbon;

use Wearesho\Bobra\Ubki;

/**
 * Class EntityTest
 * @package Wearesho\Bobra\Ubki\Tests\Data\Work
 */
class EntityTest extends Ubki\Tests\Extend\ElementTestCase
{
    protected const TAG = 'work';

    /** @var Ubki\Data\Work\Entity */
    protected $element;

    public function setUp(): void
    {
        $this->element = new Ubki\Data\Work\Entity(
            Carbon::create(2020, 10, 5, 5, 6, 0),
            Ubki\Data\Language::RUS('русский'),
            'ergpou',
            'name',
            Ubki\Data\Work\Rank::SPECIALIST(),
            1,
            200.00
        );
    }

    public function testGetExperience(): void
    {
        $this->assertEquals(1, $this->element->getExperience());
    }

    public function testGetRank(): void
    {
        $this->assertEquals(Ubki\Data\Work\Rank::SPECIALIST(), $this->element->getRank());
    }

    public function testGetErgpou(): void
    {
        $this->assertEquals('ergpou', $this->element->getErgpou());
    }

    public function testGetLanguage(): void
    {
        $this->assertEquals(Ubki\Data\Language::RUS('русский'), $this->element->getLanguage());
    }

    public function testGetIncome(): void
    {
        $this->assertEquals(200.00, $this->element->getIncome());
    }

    public function testGetName(): void
    {
        $this->assertEquals('name', $this->element->getName());
    }

    public function testGetCreatedAt(): void
    {
        $this->assertEquals(
            Carbon::create(2020, 10, 5, 5, 6, 0),
            $this->element->getCreatedAt()
        );
    }
}
