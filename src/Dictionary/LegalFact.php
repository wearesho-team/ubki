<?php

declare(strict_types=1);

namespace Wearesho\Bobra\Ubki\Dictionary;

use Wearesho\Bobra\Ubki\Dictionary;

/**
 * Class LegalFact
 * @package Wearesho\Bobra\Ubki\Dictionary
 *
 * @method static LegalFact DELIVERED_BY_COURT_OF_FIRST_INSTANCE(string $description = \null)
 * @method static LegalFact ISSUED_BY_COURT_OF_APPEAL(string $description = \null)
 * @method static LegalFact ISSUED_BY_COURT_OF_CASSATION(string $description = \null)
 * @method static LegalFact RECEIVED_DECREE_ON_RECOVERY_OF_FUNDS_FROM_ENEMY(string $description = \null)
 * @method static LegalFact RECEIVED_POSITIVE_DECISION_OF_COURT_OF_FIRST_INSTANCE(string $description = \null)
 * @method static LegalFact POSITIVE_DECISION_OF_COURT_OF_APPEAL(string $description = \null)
 * @method static LegalFact NEGATIVE_COURT_DECISION_OF_FIRST_INSTANCE_RECEIVED(string $description = \null)
 * @method static LegalFact NEGATIVE_DECISION_OF_APPELLATE_COURT(string $description = \null)
 * @method static LegalFact RECEIVED_POSITIVE_DECISION_BY_COURT_OF_CASSATION(string $description = \null)
 * @method static LegalFact NEGATIVE_DECISION_RECEIVED_BY_COURT_OF_CASSATION(string $description = \null)
 * @method static LegalFact RECEIVED_DEFINITION_OF_COLLATERAL_CLAIMS(string $description = \null)
 * @method static LegalFact ORDER_WAS_RECEIVED_ABOUT_ARREST_OF_DEBTOR(string $description = \null)
 * @method static LegalFact JUDGMENT_PASSED_PARTIALLY_SATISFYING_CLAIMS(string $description = \null)
 * @method static LegalFact DECISION_WAS_MADE_TO_ARREST_DEBTORS_FUNDS(string $description = \null)
 * @method static LegalFact RECEIVED_COURT_RULING_ON_PROHIBITION_OF_TRAVEL_ABROAD(string $description = \null)
 * @method static LegalFact ARBITRATION_COURT_DECISION_RECEIVED(string $description = \null)
 */
final class LegalFact extends Dictionary
{
    public const DELIVERED_BY_COURT_OF_FIRST_INSTANCE = 1;
    public const ISSUED_BY_COURT_OF_APPEAL = 2;
    public const ISSUED_BY_COURT_OF_CASSATION = 3;
    public const RECEIVED_DECREE_ON_RECOVERY_OF_FUNDS_FROM_ENEMY = 4;
    public const RECEIVED_POSITIVE_DECISION_OF_COURT_OF_FIRST_INSTANCE = 5;
    public const POSITIVE_DECISION_OF_COURT_OF_APPEAL = 6;
    public const NEGATIVE_COURT_DECISION_OF_FIRST_INSTANCE_RECEIVED = 7;
    public const NEGATIVE_DECISION_OF_APPELLATE_COURT = 8;
    public const RECEIVED_POSITIVE_DECISION_BY_COURT_OF_CASSATION = 9;
    public const NEGATIVE_DECISION_RECEIVED_BY_COURT_OF_CASSATION = 10;
    public const RECEIVED_DEFINITION_OF_COLLATERAL_CLAIMS = 11;
    public const ORDER_WAS_RECEIVED_ABOUT_ARREST_OF_DEBTOR = 12;
    public const JUDGMENT_PASSED_PARTIALLY_SATISFYING_CLAIMS = 13;
    public const DECISION_WAS_MADE_TO_ARREST_DEBTORS_FUNDS = 14;
    public const RECEIVED_COURT_RULING_ON_PROHIBITION_OF_TRAVEL_ABROAD = 15;
    public const ARBITRATION_COURT_DECISION_RECEIVED = 16;
}
