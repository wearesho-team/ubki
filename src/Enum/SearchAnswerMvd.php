<?php

namespace Wearesho\Bobra\Ubki\Enum;

use MyCLabs\Enum\Enum;

/**
 * Class SearchAnswerMvd
 * @package Wearesho\Bobra\Ubki\Enum
 *
 * @method static SearchAnswerMvd ERROR()
 * @method static SearchAnswerMvd NOT_FOUND()
 * @method static SearchAnswerMvd FOUND()
 * @method static SearchAnswerMvd WANTED()
 */
final class SearchAnswerMvd extends Enum
{
    public const ERROR = -1;
    public const NOT_FOUND = 0;
    public const FOUND = 1;
    public const WANTED = 2;
}
