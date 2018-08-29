<?php

namespace Wearesho\Bobra\Ubki\References;

use Wearesho\Bobra\Ubki\Reference;

/**
 * Class SubjectRole
 * @package Wearesho\Bobra\Ubki\References
 *
 * @see     https://docs.google.com/document/d/12yD1_bopAlZVAe-jFCKtGkOd15VJC4mPag_wH3gvChg/edit#heading=h.7qmsfm2ryifj
 *
 * @method static static BORROWER(string $description = null)
 * @method static static GUARANTOR(string $description = null)
 * @method static static PLEDGOR(string $description = null)
 */
final class SubjectRole extends Reference
{
    public const BORROWER = 1;
    public const GUARANTOR = 2;
    public const PLEDGOR = 3;
}
