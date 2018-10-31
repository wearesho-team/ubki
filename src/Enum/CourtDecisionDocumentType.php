<?php

namespace Wearesho\Bobra\Ubki\Enum;

use MyCLabs\Enum\Enum;

/**
 * Class CourtDecisionDocumentType
 * @package Wearesho\Bobra\Ubki\Enum
 *
 * @method static CourtDecisionDocumentType SENTENCE()
 * @method static CourtDecisionDocumentType SEPARATE_SOLUTION()
 * @method static CourtDecisionDocumentType REGULATION()
 * @method static CourtDecisionDocumentType DECISION()
 * @method static CourtDecisionDocumentType COURT_ORDER()
 * @method static CourtDecisionDocumentType COURT_DECISION()
 */
final class CourtDecisionDocumentType extends Enum
{
    public const SENTENCE = 1;
    public const SEPARATE_SOLUTION = 2;
    public const REGULATION = 3;
    public const DECISION = 4;
    public const COURT_ORDER = 5;
    public const COURT_DECISION = 6;
}
