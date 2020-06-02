<?php

namespace Wearesho\Bobra\Ubki\Tests\Data\Elements;

use Carbon\Carbon;

use Wearesho\Bobra\Ubki\Tests\TestCase;

use Wearesho\Bobra\Ubki\Data\Elements\Work;
use Wearesho\Bobra\Ubki\Data\Interfaces;
use Wearesho\Bobra\Ubki\Dictionaries;

/**
 * Class WorkTest
 * @package Wearesho\Bobra\Ubki\Tests\Data\Elements
 * @coversDefaultClass Work
 * @internal
 */
class WorkTest extends TestCase
{
    protected const CREATED_AT = '2018-03-12';
    protected const ERGPOU = 'testErgpou';
    protected const EXPERIENCE = 10;
    protected const INCOME = 1234.56;
    protected const NAME = 'testName';

    /** @var Work */
    protected $fakeWork;

    protected function setUp(): void
    {
        $this->fakeWork = new Work(
            Carbon::parse(static::CREATED_AT),
            Dictionaries\Language::RUS(),
            static::ERGPOU,
            static::NAME,
            Dictionaries\IdentifierRank::DIRECTOR(),
            static::EXPERIENCE,
            static::INCOME
        );
    }

    public function testJsonSerialize(): void
    {
        $this->assertArraySubset(
            [
                Interfaces\Work::CREATED_AT => Carbon::parse(static::CREATED_AT),
                Interfaces\Work::LANGUAGE => Dictionaries\Language::RUS(),
                Interfaces\Work::ERGPOU => static::ERGPOU,
                Interfaces\Work::NAME => static::NAME,
                Interfaces\Work::RANK => Dictionaries\IdentifierRank::DIRECTOR(),
                Interfaces\Work::EXPERIENCE => static::EXPERIENCE,
                Interfaces\Work::INCOME => static::INCOME
            ],
            $this->fakeWork->jsonSerialize()
        );
    }

    public function testTag(): void
    {
        $this->assertEquals(
            Interfaces\Work::TAG,
            $this->fakeWork->tag()
        );
    }

    public function testGetCreatedAt(): void
    {
        $this->assertEquals(
            static::CREATED_AT,
            Carbon::instance($this->fakeWork->getCreatedAt())->toDateString()
        );
    }

    public function testGetErgpou(): void
    {
        $this->assertEquals(
            static::ERGPOU,
            $this->fakeWork->getErgpou()
        );
    }

    public function testGetExperience(): void
    {
        $this->assertEquals(
            static::EXPERIENCE,
            $this->fakeWork->getExperience()
        );
    }

    public function testGetIncome(): void
    {
        $this->assertEquals(
            static::INCOME,
            $this->fakeWork->getIncome()
        );
    }

    public function testGetName(): void
    {
        $this->assertEquals(
            static::NAME,
            $this->fakeWork->getName()
        );
    }

    public function testGetRank(): void
    {
        $this->assertEquals(
            Dictionaries\IdentifierRank::DIRECTOR(),
            $this->fakeWork->getRank()
        );
    }

    public function testGetLanguage(): void
    {
        $this->assertEquals(
            Dictionaries\Language::RUS(),
            $this->fakeWork->getLanguage()
        );
    }
}
