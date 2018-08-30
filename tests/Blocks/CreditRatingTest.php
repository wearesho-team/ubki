<?php

namespace Wearesho\Bobra\Ubki\Tests\Blocks;

use Carbon\Carbon;

use PHPUnit\Framework\TestCase;

use Wearesho\Bobra\Ubki\Blocks\Collections\Comments;
use Wearesho\Bobra\Ubki\Blocks\CreditRating;
use Wearesho\Bobra\Ubki\Blocks\Entities;

/**
 * Class CreditRatingTest
 * @package Wearesho\Bobra\Ubki\Tests\Blocks
 * @coversDefaultClass CreditRating
 * @internal
 */
class CreditRatingTest extends TestCase
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
    protected const CREDITS_COUNT = 200;
    protected const OPENED_CREDITS_COUNT = 10;
    protected const OPENED_CREDIT_DESCRIPTION = 'testDescription';
    protected const CLOSED_CREDITS_COUNT = 50;
    protected const EXPIRES = 'testExpires';
    protected const MAX_OVERDUE = 'testMaxOverdue';
    protected const UPDATED_AT = '2018-03-12';
    protected const TEXT = 'testText';
    protected const ID = 'testId';
    protected const COUNT = 1;
    protected const DESCRIPTION = 'testDescription';

    /** @var CreditRating */
    protected $fakeCreditRating;

    protected function setUp(): void
    {
        $this->fakeCreditRating = new CreditRating(
            new Entities\Rating\Score(
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
            ),
            new Entities\Rating\Description(
                static::CREDITS_COUNT,
                static::OPENED_CREDITS_COUNT,
                static::OPENED_CREDIT_DESCRIPTION,
                static::CLOSED_CREDITS_COUNT,
                static::EXPIRES,
                static::MAX_OVERDUE,
                Carbon::parse(static::UPDATED_AT)
            ),
            new Comments([
                new Entities\Comment(
                    static::TEXT,
                    static::ID
                ),
            ]),
            new Entities\Rating\PositiveFactors(
                static::COUNT,
                static::DESCRIPTION,
                new Comments([
                    new Entities\Comment(
                        static::TEXT,
                        static::ID
                    ),
                ])
            ),
            new Entities\Rating\NegativeFactors(
                static::COUNT,
                static::DESCRIPTION,
                new Comments([
                    new Entities\Comment(
                        static::TEXT,
                        static::ID
                    ),
                ])
            )
        );
    }

    public function testGetScore(): void
    {
        $this->assertEquals(
            new Entities\Rating\Score(
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
            ),
            $this->fakeCreditRating->getScore()
        );
    }

    public function testGetComments(): void
    {
        $this->assertEquals(
            new Comments([
                new Entities\Comment(
                    static::TEXT,
                    static::ID
                ),
            ]),
            $this->fakeCreditRating->getComments()
        );
    }

    public function testGetNegativeFactors(): void
    {
        $this->assertEquals(
            new Entities\Rating\NegativeFactors(
                static::COUNT,
                static::DESCRIPTION,
                new Comments([
                    new Entities\Comment(
                        static::TEXT,
                        static::ID
                    ),
                ])
            ),
            $this->fakeCreditRating->getNegativeFactors()
        );
    }

    public function testGetPositiveFactors(): void
    {
        $this->assertEquals(
            new Entities\Rating\PositiveFactors(
                static::COUNT,
                static::DESCRIPTION,
                new Comments([
                    new Entities\Comment(
                        static::TEXT,
                        static::ID
                    ),
                ])
            ),
            $this->fakeCreditRating->getPositiveFactors()
        );
    }

    public function testGetDescription(): void
    {
        $this->assertEquals(
            new Entities\Rating\Description(
                static::CREDITS_COUNT,
                static::OPENED_CREDITS_COUNT,
                static::OPENED_CREDIT_DESCRIPTION,
                static::CLOSED_CREDITS_COUNT,
                static::EXPIRES,
                static::MAX_OVERDUE,
                Carbon::parse(static::UPDATED_AT)
            ),
            $this->fakeCreditRating->getDescription()
        );
    }
}
