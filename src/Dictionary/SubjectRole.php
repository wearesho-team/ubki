<?php

declare(strict_types=1);

namespace Wearesho\Bobra\Ubki\Dictionary;

use Wearesho\Bobra\Ubki\Dictionary;

/**
 * Class SubjectRole
 * @package Wearesho\Bobra\Ubki\Dictionary
 *
 * @see https://docs.google.com/document/d/12yD1_bopAlZVAe-jFCKtGkOd15VJC4mPag_wH3gvChg/edit#heading=h.7qmsfm2ryifj
 *
 * @method static SubjectRole BORROWER(string $description = \null)
 * @method static SubjectRole GUARANTOR(string $description = \null)
 * @method static SubjectRole PLEDGOR(string $description = \null)
 */
final class SubjectRole extends Dictionary
{
    public const BORROWER = 1;
    public const GUARANTOR = 2;
    public const PLEDGOR = 3;
}
