<?php

namespace Wearesho\Bobra\Ubki\Tests\Blocks\Entities;

use Carbon\Carbon;

use PHPUnit\Framework\TestCase;

use Wearesho\Bobra\Ubki\Blocks\Entities\Work;
use Wearesho\Bobra\Ubki\References;

/**
 * Class WorkTest
 * @package Wearesho\Bobra\Ubki\Tests\Blocks\Entities
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
            References\Language::RUS(),
            static::ERGPOU,
            static::NAME,
            References\IdentifierRank::DIRECTOR(),
            static::EXPERIENCE,
            static::INCOME
        );
    }

    public function testJsonSerialize(): void
    {
        $this->assertArraySubset(
            [
                'createdAt' => static::CREATED_AT,
                'language' => References\Language::RUS()->getKey(),
                'ergpou' => static::ERGPOU,
                'name' => static::NAME,
                'rank' => References\IdentifierRank::DIRECTOR()->getKey(),
                'experience' => static::EXPERIENCE,
                'income' => static::INCOME
            ],
            $this->fakeWork->jsonSerialize()
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
            References\IdentifierRank::DIRECTOR(),
            $this->fakeWork->getRank()
        );
    }

    public function testGetLanguage(): void
    {
        $this->assertEquals(
            References\Language::RUS(),
            $this->fakeWork->getLanguage()
        );
    }
}
