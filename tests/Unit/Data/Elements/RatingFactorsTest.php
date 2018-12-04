<?php

namespace Wearesho\Bobra\Ubki\Tests\Unit\Data\Elements;

use PHPUnit\Framework\TestCase;
use Wearesho\Bobra\Ubki\Data;

/**
 * Class RatingFactorsTest
 * @package Wearesho\Bobra\Ubki\Tests\Unit\Data\Elements
 * @coversDefaultClass \Wearesho\Bobra\Ubki\Data\Elements\RatingFactors
 * @internal
 */
class RatingFactorsTest extends TestCase
{
    protected const COUNT = 1;
    protected const DESCRIPTION = 'testDescription';
    protected const TEXT = 'testText';
    protected const ID = 'testId';

    /** @var Data\Elements\RatingFactors */
    protected $fakeFactors;

    protected function setUp(): void
    {
        $this->fakeFactors = new Data\Elements\PositiveRatingFactors(
            static::COUNT,
            static::DESCRIPTION,
            new Data\Collections\Comments([
                new Data\Elements\Comment(
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
                Data\Elements\RatingFactors::COUNT => static::COUNT,
                Data\Elements\RatingFactors::TEXT => static::DESCRIPTION,
                Data\Elements\RatingFactors::COMMENTS => [
                    new Data\Elements\Comment(
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
            Data\Elements\PositiveRatingFactors::TAG,
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
            new Data\Collections\Comments([
                new Data\Elements\Comment(
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
        $this->fakeFactors = new Data\Elements\NegativeRatingFactors(
            static::COUNT,
            static::DESCRIPTION,
            new Data\Collections\Comments([
                new Data\Elements\Comment(
                    static::TEXT,
                    static::ID
                ),
            ])
        );
        $this->assertEquals(
            Data\Elements\NegativeRatingFactors::TAG,
            $this->fakeFactors->tag()
        );
    }
}
