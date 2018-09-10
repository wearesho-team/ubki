<?php

namespace Wearesho\Bobra\Ubki\Tests\Data\Elements\Rating;

use Carbon\Carbon;
use Wearesho\Bobra\Ubki\Data\Elements\Rating\RatingDescription;

use PHPUnit\Framework\TestCase;

/**
 * Class DescriptionTest
 * @package Wearesho\Bobra\Ubki\Tests\Data\Elements\Rating
 * @coversDefaultClass RatingDescription
 * @internal
 */
class DescriptionTest extends TestCase
{
    protected const CREDITS_COUNT = 200;
    protected const OPENED_CREDITS_COUNT = 10;
    protected const OPENED_CREDIT_DESCRIPTION = 'testDescription';
    protected const CLOSED_CREDITS_COUNT = 50;
    protected const EXPIRES = 'testExpires';
    protected const MAX_OVERDUE = 'testMaxOverdue';
    protected const UPDATED_AT = '2018-03-12';

    /** @var RatingDescription */
    protected $fakeDescription;

    protected function setUp(): void
    {
        $this->fakeDescription = new RatingDescription(
            static::CREDITS_COUNT,
            static::OPENED_CREDITS_COUNT,
            static::OPENED_CREDIT_DESCRIPTION,
            static::CLOSED_CREDITS_COUNT,
            static::EXPIRES,
            static::MAX_OVERDUE,
            Carbon::parse(static::UPDATED_AT)
        );
    }

    public function testJsonSerialize(): void
    {
        $this->assertArraySubset(
            [
                'all' => static::CREDITS_COUNT,
                'opened' => static::OPENED_CREDITS_COUNT,
                'openedDescription' => static::OPENED_CREDIT_DESCRIPTION,
                'closed' => static::CLOSED_CREDITS_COUNT,
                'expires' => static::EXPIRES,
                'maxOverdue' => static::MAX_OVERDUE,
                'updatedAt' => static::UPDATED_AT,
            ],
            $this->fakeDescription->jsonSerialize()
        );
    }

    public function testGetOpenCreditsCount(): void
    {
        $this->assertEquals(
            static::OPENED_CREDITS_COUNT,
            $this->fakeDescription->getOpenCreditsCount()
        );
    }

    public function testGetClosedCreditsCount(): void
    {
        $this->assertEquals(
            static::CLOSED_CREDITS_COUNT,
            $this->fakeDescription->getClosedCreditsCount()
        );
    }

    public function testGetExpires(): void
    {
        $this->assertEquals(
            static::EXPIRES,
            $this->fakeDescription->getExpires()
        );
    }

    public function testGetOpenCreditsDescription(): void
    {
        $this->assertEquals(
            static::OPENED_CREDIT_DESCRIPTION,
            $this->fakeDescription->getOpenCreditsDescription()
        );
    }

    public function testGetMaxOverdue(): void
    {
        $this->assertEquals(
            static::MAX_OVERDUE,
            $this->fakeDescription->getMaxOverdue()
        );
    }

    public function testGetUpdatedAt(): void
    {
        $this->assertEquals(
            static::UPDATED_AT,
            $this->fakeDescription->getUpdatedAt()->toDateString()
        );
    }

    public function testGetCreditsCount(): void
    {
        $this->assertEquals(
            static::CREDITS_COUNT,
            $this->fakeDescription->getCreditsCount()
        );
    }
}
