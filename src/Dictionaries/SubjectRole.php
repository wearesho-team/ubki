<?php

namespace Wearesho\Bobra\Ubki\Dictionaries;

use Wearesho\Bobra\Ubki\Dictionary;

/**
 * Class SubjectRole
 * @package Wearesho\Bobra\Ubki\Dictionaries
 *
 * @see     https://docs.google.com/document/d/12yD1_bopAlZVAe-jFCKtGkOd15VJC4mPag_wH3gvChg/edit#heading=h.7qmsfm2ryifj
 *
 * @method static static BORROWER(string $description = null)
 * @method static static GUARANTOR(string $description = null)
 * @method static static PLEDGOR(string $description = null)
 */
final class SubjectRole extends Dictionary
{
    public const BORROWER = 1;
    public const GUARANTOR = 2;
    public const PLEDGOR = 3;
}
