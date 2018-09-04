<?php

namespace Wearesho\Bobra\Ubki\Tests\Blocks\Entities\Insurance;

use Carbon\Carbon;

use PHPUnit\Framework\TestCase;

use Wearesho\Bobra\Ubki\Data\Elements\Insurance;

/**
 * Class EventTest
 * @package Wearesho\Bobra\Ubki\Tests\Data\Elements\Insurance
 * @coversDefaultClass Insurance\InsuranceEvent
 * @internal
 */
class EventTest extends TestCase
{
    protected const REQUEST_DATE = '2018-03-12';
    protected const DECISION = 1;
    protected const DECISION_DATE = '2018-03-12';

    /** @var Insurance\InsuranceEvent */
    protected $fakeInsuranceEvent;

    protected function setUp(): void
    {
        $this->fakeInsuranceEvent = new Insurance\InsuranceEvent(
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
