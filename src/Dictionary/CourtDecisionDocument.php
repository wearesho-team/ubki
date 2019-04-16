<?php

declare(strict_types=1);

namespace Wearesho\Bobra\Ubki\Dictionary;

use Wearesho\Bobra\Ubki\Dictionary;

/**
 * Class CourtDecisionDocument
 * @package Wearesho\Bobra\Ubki\Dictionary
 *
 * @method static CourtDecisionDocument SENTENCE(string $description = \null)
 * @method static CourtDecisionDocument SEPARATE_SOLUTION(string $description = \null)
 * @method static CourtDecisionDocument REGULATION(string $description = \null)
 * @method static CourtDecisionDocument DECISION(string $description = \null)
 * @method static CourtDecisionDocument COURT_ORDER(string $description = \null)
 * @method static CourtDecisionDocument COURT_DECISION(string $description = \null)
 */
final class CourtDecisionDocument extends Dictionary
{
    public const SENTENCE = 1;
    public const SEPARATE_SOLUTION = 2;
    public const REGULATION = 3;
    public const DECISION = 4;
    public const COURT_ORDER = 5;
    public const COURT_DECISION = 6;
}
