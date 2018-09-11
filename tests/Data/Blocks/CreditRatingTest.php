<?php

namespace Wearesho\Bobra\Ubki\Tests\Data;

use Carbon\Carbon;

use PHPUnit\Framework\TestCase;

use Wearesho\Bobra\Ubki\Data\Collections\Comments;
use Wearesho\Bobra\Ubki\Data\Blocks\CreditRating;
use Wearesho\Bobra\Ubki\Data\Elements;

/**
 * Class CreditRatingTest
 * @package Wearesho\Bobra\Ubki\Tests\Data
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
            new Elements\RatingScore(
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
            new Elements\RatingDescription(
                static::CREDITS_COUNT,
                static::OPENED_CREDITS_COUNT,
                static::OPENED_CREDIT_DESCRIPTION,
                static::CLOSED_CREDITS_COUNT,
                static::EXPIRES,
                static::MAX_OVERDUE,
                Carbon::parse(static::UPDATED_AT)
            ),
            new Comments([
                new Elements\Comment(
                    static::TEXT,
                    static::ID
                ),
            ]),
            new Elements\PositiveRatingFactors(
                static::COUNT,
                static::DESCRIPTION,
                new Comments([
                    new Elements\Comment(
                        static::TEXT,
                        static::ID
                    ),
                ])
            ),
            new Elements\NegativeRatingFactors(
                static::COUNT,
                static::DESCRIPTION,
                new Comments([
                    new Elements\Comment(
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
                    Elements\RatingScore::INN => static::INN,
                    Elements\RatingScore::SURNAME => static::SURNAME,
                    Elements\RatingScore::NAME => static::NAME,
                    Elements\RatingScore::PATRONYMIC => static::PATRONYMIC,
                    Elements\RatingScore::BIRTH_DATE => Carbon::parse(static::BIRTH_DATE),
                    Elements\RatingScore::SCORE => [
                        Elements\RatingScore::CURRENT => [
                            Elements\RatingScore::DATE => Carbon::parse(static::DATE),
                            Elements\RatingScore::VALUE => static::SCORE,
                        ],
                        Elements\RatingScore::PREVIOUS => [
                            Elements\RatingScore::DATE => Carbon::parse(static::PREVIOUS_DATE),
                            Elements\RatingScore::VALUE => static::PREVIOUS_SCORE,
                        ]
                    ],
                ],
                'description' => [
                    Elements\RatingDescription::CREDITS_COUNT => static::CREDITS_COUNT,
                    Elements\RatingDescription::OPEN_CREDITS_COUNT => static::OPENED_CREDITS_COUNT,
                    Elements\RatingDescription::DESCRIPTION => static::OPENED_CREDIT_DESCRIPTION,
                    Elements\RatingDescription::CLOSED_CREDITS_COUNT => static::CLOSED_CREDITS_COUNT,
                    Elements\RatingDescription::EXPIRES => static::EXPIRES,
                    Elements\RatingDescription::MAX_OVERDUE => static::MAX_OVERDUE,
                    Elements\RatingDescription::UPDATED_AT => Carbon::parse(static::UPDATED_AT),
                ],
                'comments' => [
                    new Elements\Comment(
                        static::TEXT,
                        static::ID
                    )
                ],
                'factors' => [
                    'positive' => [
                        Elements\RatingFactors::COUNT => static::COUNT,
                        Elements\RatingFactors::TEXT => static::DESCRIPTION,
                        Elements\RatingFactors::COMMENTS => [
                            new Elements\Comment(
                                static::TEXT,
                                static::ID
                            ),
                        ],
                    ],
                    'negative' => [
                        Elements\RatingFactors::COUNT => static::COUNT,
                        Elements\RatingFactors::TEXT => static::DESCRIPTION,
                        Elements\RatingFactors::COMMENTS => [
                            new Elements\Comment(
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
            CreditRating::TAG,
            $this->fakeCreditRating->tag()
        );
    }

    public function testGetScore(): void
    {
        $this->assertEquals(
            new Elements\RatingScore(
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
                new Elements\Comment(
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
            new Elements\NegativeRatingFactors(
                static::COUNT,
                static::DESCRIPTION,
                new Comments([
                    new Elements\Comment(
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
            new Elements\PositiveRatingFactors(
                static::COUNT,
                static::DESCRIPTION,
                new Comments([
                    new Elements\Comment(
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
            new Elements\RatingDescription(
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
