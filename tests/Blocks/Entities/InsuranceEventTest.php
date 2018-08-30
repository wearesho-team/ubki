<?php

namespace Wearesho\Bobra\Ubki\Tests\Blocks\Entities;

use Carbon\Carbon;

use PHPUnit\Framework\TestCase;

use Wearesho\Bobra\Ubki\Blocks\Entities\InsuranceEvent;

/**
 * Class InsuranceEventTest
 * @package Wearesho\Bobra\Ubki\Tests\Blocks\Entities
 * @coversDefaultClass InsuranceEvent
 * @internal
 */
class InsuranceEventTest extends TestCase
{
    protected const REQUEST_DATE = '2018-03-12';
    protected const DECISION = 1;
    protected const DECISION_DATE = '2018-03-12';

    /** @var InsuranceEvent */
    protected $fakeInsuranceEvent;

    protected function setUp(): void
    {
        $this->fakeInsuranceEvent = new InsuranceEvent(
            Carbon::parse(static::REQUEST_DATE),
            static::DECISION,
            Carbon::parse(static::DECISION_DATE)
        );
    }

    public function testJsonSerialize(): void
    {
        $this->assertArraySubset(
            [
                'requestDate' => static::REQUEST_DATE,
                'decision' => static::DECISION,
                'decisionDate' => static::DECISION_DATE
            ],
            $this->fakeInsuranceEvent->jsonSerialize()
        );
    }

    public function testGetRequestDate(): void
    {
        $this->assertEquals(
            static::REQUEST_DATE,
            Carbon::instance($this->fakeInsuranceEvent->getRequestDate())->toDateString()
        );
    }

    public function testGetDecision(): void
    {
        $this->assertEquals(
            static::DECISION,
            $this->fakeInsuranceEvent->getDecision()
        );
    }

    public function testGetDecisionDate(): void
    {
        $this->assertEquals(
            static::DECISION_DATE,
            Carbon::instance($this->fakeInsuranceEvent->getDecisionDate())->toDateString()
        );
    }
}
