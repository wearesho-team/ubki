<?php

namespace Wearesho\Bobra\Ubki\Enum;

use MyCLabs\Enum\Enum;

/**
 * Class CounterpartyStatusSource
 * @package Wearesho\Bobra\Ubki\Enum
 *
 * @method static CounterpartyStatusSource FROM_PUBLIC()
 * @method static CounterpartyStatusSource UNIFIED_STATE_REGISTER()
 * @method static CounterpartyStatusSource CORPORATE_NEWS_AGENCY()
 * @method static CounterpartyStatusSource MINISTRY_OF_REVENUE_AND_FEES_OF_UKRAINE()
 */
final class CounterpartyStatusSource extends Enum
{
    public const FROM_PUBLIC = 0;
    public const UNIFIED_STATE_REGISTER = 1;
    public const CORPORATE_NEWS_AGENCY = 2;
    public const MINISTRY_OF_REVENUE_AND_FEES_OF_UKRAINE = 3;
}
