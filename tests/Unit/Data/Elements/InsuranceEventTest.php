<?php

namespace Wearesho\Bobra\Ubki\Tests\Unit\Data\Elements;

use Carbon\Carbon;
use PHPUnit\Framework\TestCase;
use Wearesho\Bobra\Ubki;

/**
 * Class EventTest
 * @package Wearesho\Bobra\Ubki\Tests\Unit\Data\Elements
 * @coversDefaultClass \Wearesho\Bobra\Ubki\Data\Elements\InsuranceEvent
 * @internal
 */
class InsuranceEventTest extends TestCase
{
    protected const REQUEST_DATE = '2018-03-12';
    protected const DECISION_DATE = '2018-03-12';

    /** @var Ubki\Data\Elements\InsuranceEvent */
    protected $fakeInsuranceEvent;

    protected function setUp(): void
    {
        $this->fakeInsuranceEvent = new Ubki\Data\Elements\InsuranceEvent(
            Carbon::parse(static::REQUEST_DATE),
            Ubki\Dictionaries\InsuranceDecisionStatus::POSITIVE(),
            Carbon::parse(static::DECISION_DATE)
        );
    }

    public function testJsonSerialize(): void
    {
        $this->assertArraySubset(
            [
                Ubki\Data\Elements\InsuranceEvent::REQUEST_DATE => Carbon::parse(static::REQUEST_DATE),
                Ubki\Data\Elements\InsuranceEvent::DECISION => Ubki\Dictionaries\InsuranceDecisionStatus::POSITIVE(),
                Ubki\Data\Elements\InsuranceEvent::DECISION_DATE => Carbon::parse(static::DECISION_DATE)
            ],
            $this->fakeInsuranceEvent->jsonSerialize()
        );
    }

    public function testTag(): void
    {
        $this->assertEquals(
            Ubki\Data\Elements\InsuranceEvent::TAG,
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
            Ubki\Dictionaries\InsuranceDecisionStatus::POSITIVE(),
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
