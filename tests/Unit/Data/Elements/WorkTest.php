<?php

namespace Wearesho\Bobra\Ubki\Tests\Unit\Data\Elements;

use Carbon\Carbon;
use PHPUnit\Framework\TestCase;
use Wearesho\Bobra\Ubki;

/**
 * Class WorkTest
 * @package Wearesho\Bobra\Ubki\Tests\Unit\Data\Elements
 * @coversDefaultClass \Wearesho\Bobra\Ubki\Data\Elements\Work
 * @internal
 */
class WorkTest extends TestCase
{
    protected const CREATED_AT = '2018-03-12';
    protected const ERGPOU = 'testErgpou';
    protected const EXPERIENCE = 10;
    protected const INCOME = 1234.56;
    protected const NAME = 'testName';

    /** @var Ubki\Data\Elements\Work */
    protected $fakeWork;

    protected function setUp(): void
    {
        $this->fakeWork = new Ubki\Data\Elements\Work(
            Carbon::parse(static::CREATED_AT),
            Ubki\Dictionaries\Language::RUS(),
            static::ERGPOU,
            static::NAME,
            Ubki\Dictionaries\IdentifierRank::DIRECTOR(),
            static::EXPERIENCE,
            static::INCOME
        );
    }

    public function testJsonSerialize(): void
    {
        $this->assertArraySubset(
            [
                Ubki\Data\Interfaces\Work::CREATED_AT => Carbon::parse(static::CREATED_AT),
                Ubki\Data\Interfaces\Work::LANGUAGE => Ubki\Dictionaries\Language::RUS(),
                Ubki\Data\Interfaces\Work::ERGPOU => static::ERGPOU,
                Ubki\Data\Interfaces\Work::NAME => static::NAME,
                Ubki\Data\Interfaces\Work::RANK => Ubki\Dictionaries\IdentifierRank::DIRECTOR(),
                Ubki\Data\Interfaces\Work::EXPERIENCE => static::EXPERIENCE,
                Ubki\Data\Interfaces\Work::INCOME => static::INCOME
            ],
            $this->fakeWork->jsonSerialize()
        );
    }

    public function testTag(): void
    {
        $this->assertEquals(
            Ubki\Data\Interfaces\Work::TAG,
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
            Ubki\Dictionaries\IdentifierRank::DIRECTOR(),
            $this->fakeWork->getRank()
        );
    }

    public function testGetLanguage(): void
    {
        $this->assertEquals(
            Ubki\Dictionaries\Language::RUS(),
            $this->fakeWork->getLanguage()
        );
    }
}
