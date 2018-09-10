<?php

namespace Wearesho\Bobra\Ubki\Tests\Data\Elements\Rating;

use PHPUnit\Framework\TestCase;

use Wearesho\Bobra\Ubki\Data\Collections\Comments;
use Wearesho\Bobra\Ubki\Data\Elements\Comment;
use Wearesho\Bobra\Ubki\Data\Elements\Rating\RatingFactors;
use Wearesho\Bobra\Ubki\Data\Elements\Rating\PositiveRatingFactors;

/**
 * Class FactorsTest
 * @package Wearesho\Bobra\Ubki\Tests\Data\Elements\Rating
 * @coversDefaultClass RatingFactors
 * @internal
 */
class FactorsTest extends TestCase
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
                'count' => static::COUNT,
                'text' => static::DESCRIPTION,
                'comments' => [
                    [
                        'id' => static::ID,
                        'text' => static::TEXT,
                    ],
                ],
            ],
            $this->fakeFactors->jsonSerialize()
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
}
