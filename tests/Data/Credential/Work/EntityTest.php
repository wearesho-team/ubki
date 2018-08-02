<?php

namespace Wearesho\Bobra\Ubki\Tests\Data\Credential\Work;

use Carbon\Carbon;

use Wearesho\Bobra\Ubki\Data;
use Wearesho\Bobra\Ubki\Tests;

/**
 * Class EntityTest
 * @internal
 * @package Wearesho\Bobra\Ubki\Tests\Data\Credential\Work
 */
class EntityTest extends Tests\Extend\ElementTestCase
{
    protected const TAG = 'work';

    /** @var Data\Credential\Work\Entity */
    protected $element;

    public function testGetExperience(): void
    {
        $this->assertEquals(1, $this->element->getExperience());
    }

    public function testGetRank(): void
    {
        $this->assertEquals(Data\Credential\Work\Rank::SPECIALIST(), $this->element->getRank());
    }

    public function testGetErgpou(): void
    {
        $this->assertEquals('ergpou', $this->element->getErgpou());
    }

    public function testGetLanguage(): void
    {
        $this->assertEquals(Data\Language::RUS('русский'), $this->element->getLanguage());
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

    protected function setUp(): void
    {
        $this->element = new Data\Credential\Work\Entity(
            Carbon::create(2020, 10, 5, 5, 6, 0),
            Data\Language::RUS('русский'),
            'ergpou',
            'name',
            Data\Credential\Work\Rank::SPECIALIST(),
            1,
            200.00
        );
    }
}
