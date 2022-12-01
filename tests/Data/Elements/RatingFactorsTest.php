<?php

namespace Wearesho\Bobra\Ubki\Tests\Data\Elements;

use Wearesho\Bobra\Ubki\Tests\TestCase;
use Wearesho\Bobra\Ubki\Data\Collections\Comments;
use Wearesho\Bobra\Ubki\Data\Elements\Comment;
use Wearesho\Bobra\Ubki\Data\Elements\NegativeRatingFactors;
use Wearesho\Bobra\Ubki\Data\Elements\RatingFactors;
use Wearesho\Bobra\Ubki\Data\Elements\PositiveRatingFactors;

/**
 * Class RatingFactorsTest
 * @package Wearesho\Bobra\Ubki\Tests\Data\Elements\Rating
 * @coversDefaultClass RatingFactors
 * @internal
 */
class RatingFactorsTest extends TestCase
{
    protected const COUNT = 1;
    protected const DESCRIPTION = 'testDescription';
    protected const TEXT = 'testText';
    protected const ID = 'testId';

    /** @var RatingFactors */
    protected $fakeFactors;

    protected function setUp(): void
    {
        $this->fakeFactors = new PositiveRatingFactors(
            static::COUNT,
            static::DESCRIPTION,
            new Comments([
                new Comment(
                    static::TEXT,
                    static::ID
                ),
            ])
        );
    }

    public function testJsonSerialize(): void
    {
        $this->assertEquals(
            [
                RatingFactors::COUNT => static::COUNT,
                RatingFactors::TEXT => static::DESCRIPTION,
                RatingFactors::COMMENTS => [
                    new Comment(
                        static::TEXT,
                        static::ID
                    ),
                ],
            ],
            $this->fakeFactors->jsonSerialize()
        );
    }

    public function testTag(): void
    {
        $this->assertEquals(
            PositiveRatingFactors::TAG,
            $this->fakeFactors->tag()
        );
    }

    public function testGetDescription(): void
    {
        $this->assertEquals(
            static::DESCRIPTION,
            $this->fakeFactors->getDescription()
        );
    }

    public function testGetComments(): void
    {
        $this->assertEquals(
            new Comments([
                new Comment(
                    static::TEXT,
                    static::ID
                ),
            ]),
            $this->fakeFactors->getComments()
        );
    }

    public function testGetCount(): void
    {
        $this->assertEquals(
            static::COUNT,
            $this->fakeFactors->getCount()
        );
    }

    public function testNegativeFactorsTag(): void
    {
        $this->fakeFactors = new NegativeRatingFactors(
            static::COUNT,
            static::DESCRIPTION,
            new Comments([
                new Comment(
                    static::TEXT,
                    static::ID
                ),
            ])
        );
        $this->assertEquals(
            NegativeRatingFactors::TAG,
            $this->fakeFactors->tag()
        );
    }
}
