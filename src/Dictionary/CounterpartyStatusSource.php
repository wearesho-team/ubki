<?php

declare(strict_types=1);

namespace Wearesho\Bobra\Ubki\Dictionary;

use Wearesho\Bobra\Ubki\Dictionary;

/**
 * Class CounterpartyStatusSource
 * @package Wearesho\Bobra\Ubki\Dictionary
 *
 * @method static CounterpartyStatusSource FROM_PUBLIC(string $description = \null)
 * @method static CounterpartyStatusSource UNIFIED_STATE_REGISTER(string $description = \null)
 * @method static CounterpartyStatusSource CORPORATE_NEWS_AGENCY(string $description = \null)
 * @method static CounterpartyStatusSource MINISTRY_OF_REVENUE_AND_FEES_OF_UKRAINE(string $description = \null)
 */
final class CounterpartyStatusSource extends Dictionary
{
    public const FROM_PUBLIC = 0;
    public const UNIFIED_STATE_REGISTER = 1;
    public const CORPORATE_NEWS_AGENCY = 2;
    public const MINISTRY_OF_REVENUE_AND_FEES_OF_UKRAINE = 3;
}
