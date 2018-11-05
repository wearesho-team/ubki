<?php

namespace Wearesho\Bobra\Ubki\Tests\Unit\Enum;

use PHPUnit\Framework\TestCase;
use Wearesho\Bobra\Ubki\Enum\LegalFact;

/**
 * Class LegalFactTest
 * @package Wearesho\Bobra\Ubki\Tests\Unit\Enum
 * @coversDefaultClass LegalFact
 * @internal
 */
class LegalFactTest extends TestCase
{
    public function testEnums(): void
    {
        $this->assertEquals(
            LegalFact::ARBITRATION_COURT_DECISION_RECEIVED(),
            new LegalFact(LegalFact::ARBITRATION_COURT_DECISION_RECEIVED)
        );
        $this->assertEquals(
            LegalFact::DECISION_WAS_MADE_TO_ARREST_DEBTORS_FUNDS(),
            new LegalFact(LegalFact::DECISION_WAS_MADE_TO_ARREST_DEBTORS_FUNDS)
        );
        $this->assertEquals(
            LegalFact::DELIVERED_BY_COURT_OF_FIRST_INSTANCE(),
            new LegalFact(LegalFact::DELIVERED_BY_COURT_OF_FIRST_INSTANCE)
        );
        $this->assertEquals(
            LegalFact::ISSUED_BY_COURT_OF_APPEAL(),
            new LegalFact(LegalFact::ISSUED_BY_COURT_OF_APPEAL)
        );
        $this->assertEquals(
            LegalFact::ISSUED_BY_COURT_OF_CASSATION(),
            new LegalFact(LegalFact::ISSUED_BY_COURT_OF_CASSATION)
        );
        $this->assertEquals(
            LegalFact::JUDGMENT_PASSED_PARTIALLY_SATISFYING_CLAIMS(),
            new LegalFact(LegalFact::JUDGMENT_PASSED_PARTIALLY_SATISFYING_CLAIMS)
        );
        $this->assertEquals(
            LegalFact::NEGATIVE_COURT_DECISION_OF_FIRST_INSTANCE_RECEIVED(),
            new LegalFact(LegalFact::NEGATIVE_COURT_DECISION_OF_FIRST_INSTANCE_RECEIVED)
        );
        $this->assertEquals(
            LegalFact::NEGATIVE_DECISION_OF_APPELLATE_COURT(),
            new LegalFact(LegalFact::NEGATIVE_DECISION_OF_APPELLATE_COURT)
        );
        $this->assertEquals(
            LegalFact::NEGATIVE_DECISION_RECEIVED_BY_COURT_OF_CASSATION(),
            new LegalFact(LegalFact::NEGATIVE_DECISION_RECEIVED_BY_COURT_OF_CASSATION)
        );
        $this->assertEquals(
            LegalFact::ORDER_WAS_RECEIVED_ABOUT_ARREST_OF_DEBTOR(),
            new LegalFact(LegalFact::ORDER_WAS_RECEIVED_ABOUT_ARREST_OF_DEBTOR)
        );
        $this->assertEquals(
            LegalFact::POSITIVE_DECISION_OF_COURT_OF_APPEAL(),
            new LegalFact(LegalFact::POSITIVE_DECISION_OF_COURT_OF_APPEAL)
        );
        $this->assertEquals(
            LegalFact::RECEIVED_COURT_RULING_ON_PROHIBITION_OF_TRAVEL_ABROAD(),
            new LegalFact(LegalFact::RECEIVED_COURT_RULING_ON_PROHIBITION_OF_TRAVEL_ABROAD)
        );
        $this->assertEquals(
            LegalFact::RECEIVED_DECREE_ON_RECOVERY_OF_FUNDS_FROM_ENEMY(),
            new LegalFact(LegalFact::RECEIVED_DECREE_ON_RECOVERY_OF_FUNDS_FROM_ENEMY)
        );
        $this->assertEquals(
            LegalFact::RECEIVED_DEFINITION_OF_COLLATERAL_CLAIMS(),
            new LegalFact(LegalFact::RECEIVED_DEFINITION_OF_COLLATERAL_CLAIMS)
        );
        $this->assertEquals(
            LegalFact::RECEIVED_POSITIVE_DECISION_BY_COURT_OF_CASSATION(),
            new LegalFact(LegalFact::RECEIVED_POSITIVE_DECISION_BY_COURT_OF_CASSATION)
        );
        $this->assertEquals(
            LegalFact::RECEIVED_POSITIVE_DECISION_OF_COURT_OF_FIRST_INSTANCE(),
            new LegalFact(LegalFact::RECEIVED_POSITIVE_DECISION_OF_COURT_OF_FIRST_INSTANCE)
        );
    }
}
