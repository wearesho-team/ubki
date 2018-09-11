<?php

namespace Wearesho\Bobra\Ubki\Tests\Data\Elements\Insurance;

use Carbon\Carbon;

use PHPUnit\Framework\TestCase;

use Wearesho\Bobra\Ubki\Data\Elements\InsuranceEvent;
use Wearesho\Bobra\Ubki\Dictionaries\InsuranceDecisionStatus;

/**
 * Class EventTest
 * @package Wearesho\Bobra\Ubki\Tests\Data\Elements\Insurance
 * @coversDefaultClass InsuranceEvent
 * @internal
 */
class InsuranceEventTest extends TestCase
{
    protected const REQUEST_DATE = '2018-03-12';
    protected const DECISION_DATE = '2018-03-12';

    /** @var InsuranceEvent */
    protected $fakeInsuranceEvent;

    protected function setUp(): void
    {
        $this->fakeInsuranceEvent = new InsuranceEvent(
            Carbon::parse(static::REQUEST_DATE),
            InsuranceDecisionStatus::POSITIVE(),
            Carbon::parse(static::DECISION_DATE)
        );
    }

    public function testJsonSerialize(): void
    {
        $this->assertArraySubset(
            [
                InsuranceEvent::REQUEST_DATE => Carbon::parse(static::REQUEST_DATE),
                InsuranceEvent::DECISION => InsuranceDecisionStatus::POSITIVE(),
                InsuranceEvent::DECISION_DATE => Carbon::parse(static::DECISION_DATE)
            ],
            $this->fakeInsuranceEvent->jsonSerialize()
        );
    }

    public function testTag(): void
    {
        $this->assertEquals(
            InsuranceEvent::TAG,
            $this->fakeInsuranceEvent->tag()
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
            InsuranceDecisionStatus::POSITIVE(),
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
