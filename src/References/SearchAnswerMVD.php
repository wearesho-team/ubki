<?php

namespace Wearesho\Bobra\Ubki\References;

use Wearesho\Bobra\Ubki\Reference;

/**
 * Class SearchAnswerMVD
 * @package Wearesho\Bobra\Ubki\References
 *
 * @method static static ERROR(string $description = null)
 * @method static static NOT_FOUND(string $description = null)
 * @method static static FOUND(string $description = null)
 * @method static static WANTED(string $description = null)
 */
final class SearchAnswerMVD extends Reference
{
    public const ERROR = -1;
    public const NOT_FOUND = 0;
    public const FOUND = 1;
    public const WANTED = 2;
}
