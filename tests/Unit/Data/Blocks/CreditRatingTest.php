<?php

namespace Wearesho\Bobra\Ubki\Tests\Unit\Data\Blocks;

use Carbon\Carbon;
use PHPUnit\Framework\TestCase;
use Wearesho\Bobra\Ubki\Data;

/**
 * Class CreditRatingTest
 * @package Wearesho\Bobra\Ubki\Tests\Unit\Data\Blocks
 * @coversDefaultClass \Wearesho\Bobra\Ubki\Data\Blocks\CreditRating
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

    /** @var Data\Blocks\CreditRating */
    protected $fakeCreditRating;

    protected function setUp(): void
    {
        $this->fakeCreditRating = new Data\Blocks\CreditRating(
            new Data\Elements\RatingScore(
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
            new Data\Elements\RatingDescription(
                static::CREDITS_COUNT,
                static::OPENED_CREDITS_COUNT,
                static::OPENED_CREDIT_DESCRIPTION,
                static::CLOSED_CREDITS_COUNT,
                static::EXPIRES,
                static::MAX_OVERDUE,
                Carbon::parse(static::UPDATED_AT)
            ),
            new Data\Collections\Comments([
                new Data\Elements\Comment(
                    static::TEXT,
                    static::ID
                ),
            ]),
            new Data\Elements\PositiveRatingFactors(
                static::COUNT,
                static::DESCRIPTION,
                new Data\Collections\Comments([
                    new Data\Elements\Comment(
                        static::TEXT,
                        static::ID
                    ),
                ])
            ),
            new Data\Elements\NegativeRatingFactors(
                static::COUNT,
                static::DESCRIPTION,
                new Data\Collections\Comments([
                    new Data\Elements\Comment(
                        static::TEXT,
                        static::ID
                    ),
                ])
            )
        );
    }

    public function testJsonSerialize(): void
    {
        $this->assertArraySubset(
            [
                'rating' => [
                    Data\Elements\RatingScore::INN => static::INN,
                    Data\Elements\RatingScore::SURNAME => static::SURNAME,
                    Data\Elements\RatingScore::NAME => static::NAME,
                    Data\Elements\RatingScore::PATRONYMIC => static::PATRONYMIC,
                    Data\Elements\RatingScore::BIRTH_DATE => Carbon::parse(static::BIRTH_DATE),
                    Data\Elements\RatingScore::SCORE => [
                        Data\Elements\RatingScore::CURRENT => [
                            Data\Elements\RatingScore::DATE => Carbon::parse(static::DATE),
                            Data\Elements\RatingScore::VALUE => static::SCORE,
                        ],
                        Data\Elements\RatingScore::PREVIOUS => [
                            Data\Elements\RatingScore::DATE => Carbon::parse(static::PREVIOUS_DATE),
                            Data\Elements\RatingScore::VALUE => static::PREVIOUS_SCORE,
                        ]
                    ],
                ],
                'description' => [
                    Data\Elements\RatingDescription::CREDITS_COUNT => static::CREDITS_COUNT,
                    Data\Elements\RatingDescription::OPEN_CREDITS_COUNT => static::OPENED_CREDITS_COUNT,
                    Data\Elements\RatingDescription::DESCRIPTION => static::OPENED_CREDIT_DESCRIPTION,
                    Data\Elements\RatingDescription::CLOSED_CREDITS_COUNT => static::CLOSED_CREDITS_COUNT,
                    Data\Elements\RatingDescription::EXPIRES => static::EXPIRES,
                    Data\Elements\RatingDescription::MAX_OVERDUE => static::MAX_OVERDUE,
                    Data\Elements\RatingDescription::UPDATED_AT => Carbon::parse(static::UPDATED_AT),
                ],
                'comments' => [
                    new Data\Elements\Comment(
                        static::TEXT,
                        static::ID
                    )
                ],
                'factors' => [
                    'positive' => [
                        Data\Elements\RatingFactors::COUNT => static::COUNT,
                        Data\Elements\RatingFactors::TEXT => static::DESCRIPTION,
                        Data\Elements\RatingFactors::COMMENTS => [
                            new Data\Elements\Comment(
                                static::TEXT,
                                static::ID
                            ),
                        ],
                    ],
                    'negative' => [
                        Data\Elements\RatingFactors::COUNT => static::COUNT,
                        Data\Elements\RatingFactors::TEXT => static::DESCRIPTION,
                        Data\Elements\RatingFactors::COMMENTS => [
                            new Data\Elements\Comment(
                                static::TEXT,
                                static::ID
                            ),
                        ],
                    ],
                ],
            ],
            $this->fakeCreditRating->jsonSerialize()
        );
    }

    public function testTag(): void
    {
        $this->assertEquals(
            Data\Blocks\CreditRating::TAG,
            $this->fakeCreditRating->tag()
        );
    }

    public function testGetScore(): void
    {
        $this->assertEquals(
            new Data\Elements\RatingScore(
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
            new Data\Collections\Comments([
                new Data\Elements\Comment(
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
            new Data\Elements\NegativeRatingFactors(
                static::COUNT,
                static::DESCRIPTION,
                new Data\Collections\Comments([
                    new Data\Elements\Comment(
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
            new Data\Elements\PositiveRatingFactors(
                static::COUNT,
                static::DESCRIPTION,
                new Data\Collections\Comments([
                    new Data\Elements\Comment(
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
            new Data\Elements\RatingDescription(
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
