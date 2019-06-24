<?php

declare(strict_types=1);

namespace Wearesho\Bobra\Ubki\Dictionary;

use Wearesho\Bobra\Ubki\Dictionary;

/**
 * Class SearchAnswerMVD
 * @package Wearesho\Bobra\Ubki\Dictionary
 *
 * @method static SearchAnswerMVD ERROR(string $description = \null)
 * @method static SearchAnswerMVD NOT_FOUND(string $description = \null)
 * @method static SearchAnswerMVD FOUND(string $description = \null)
 * @method static SearchAnswerMVD WANTED(string $description = \null)
 */
final class SearchAnswerMVD extends Dictionary
{
    public const ERROR = -1;
    public const NOT_FOUND = 0;
    public const FOUND = 1;
    public const WANTED = 2;
}
