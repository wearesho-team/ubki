<?php

namespace Wearesho\Bobra\Ubki\Tests\Data\Elements;

use Carbon\Carbon;
use Wearesho\Bobra\Ubki\Tests\TestCase;
use Wearesho\Bobra\Ubki\Data\Elements\RatingScore;

/**
 * Class RatingScoreTest
 * @package Wearesho\Bobra\Ubki\Tests\Data\Elements\Rating
 * @coversDefaultClass RatingScore
 * @internal
 */
class RatingScoreTest extends TestCase
{
    protected const INN = 'testInn';
    protected const SURNAME = 'testSurname';
    protected const NAME = 'testName';
    protected const PATRONYMIC = 'testPatronymic';
    protected const BIRTH_DATE = '1998-03-12';
    protected const SCORE = 'testScore';
    protected const PREVIOUS_SCORE = 'testPreviousScore';
    protected const DATE = '2018-03-12';
    protected const PREVIOUS_DATE = '2017-03-12';
    protected const LEVEL = 'testLevel';

    /** @var RatingScore */
    protected $fakeScore;

    protected function setUp(): void
    {
        $this->fakeScore = new RatingScore(
            static::INN,
            static::SURNAME,
            static::NAME,
            static::PATRONYMIC,
            Carbon::parse(static::BIRTH_DATE),
            static::SCORE,
            static::PREVIOUS_SCORE,
            Carbon::parse(static::DATE),
            Carbon::parse(static::PREVIOUS_DATE),
            static::LEVEL
        );
    }

    public function testJsonSerialize(): void
    {
        $this->assertArraySubset(
            [
                RatingScore::INN => static::INN,
                RatingScore::SURNAME => static::SURNAME,
                RatingScore::NAME => static::NAME,
                RatingScore::PATRONYMIC => static::PATRONYMIC,
                RatingScore::BIRTH_DATE => Carbon::parse(static::BIRTH_DATE),
                RatingScore::SCORE => [
                    RatingScore::CURRENT => [
                        RatingScore::DATE => Carbon::parse(static::DATE),
                        RatingScore::VALUE => static::SCORE
                    ],
                    RatingScore::PREVIOUS => [
                        RatingScore::DATE => Carbon::parse(static::PREVIOUS_DATE),
                        RatingScore::VALUE => static::PREVIOUS_SCORE,
                    ]
                ],
            ],
            $this->fakeScore->jsonSerialize()
        );
    }

    public function testTag(): void
    {
        $this->assertEquals(
            RatingScore::TAG,
            $this->fakeScore->tag()
        );
    }

    public function testGetSurname(): void
    {
        $this->assertEquals(
            static::SURNAME,
            $this->fakeScore->getSurname()
        );
    }

    public function testGetName(): void
    {
        $this->assertEquals(
            static::NAME,
            $this->fakeScore->getName()
        );
    }

    public function testGetBirthDate(): void
    {
        $this->assertEquals(
            static::BIRTH_DATE,
            $this->fakeScore->getBirthDate()->toDateString()
        );
    }

    public function testGetDate(): void
    {
        $this->assertEquals(
            static::DATE,
            $this->fakeScore->getDate()->toDateString()
        );
    }

    public function testGetScore(): void
    {
        $this->assertEquals(
            static::SCORE,
            $this->fakeScore->getScore()
        );
    }

    public function testGetPreviousScore(): void
    {
        $this->assertEquals(
            static::PREVIOUS_SCORE,
            $this->fakeScore->getPreviousScore()
        );
    }

    public function testGetInn(): void
    {
        $this->assertEquals(
            static::INN,
            $this->fakeScore->getInn()
        );
    }

    public function testGetLevel(): void
    {
        $this->assertEquals(
            static::LEVEL,
            $this->fakeScore->getLevel()
        );
    }

    public function testGetPreviousDate(): void
    {
        $this->assertEquals(
            static::PREVIOUS_DATE,
            $this->fakeScore->getPreviousDate()->toDateString()
        );
    }

    public function testGetPatronymic(): void
    {
        $this->assertEquals(
            static::PATRONYMIC,
            $this->fakeScore->getPatronymic()
        );
    }
}
