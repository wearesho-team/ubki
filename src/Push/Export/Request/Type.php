<?php

namespace Wearesho\Bobra\Ubki\Push\Export\Request;

use Wearesho\Bobra\Ubki\Dictionary;

/**
 * Class Type
 * @package Wearesho\Bobra\Ubki\Push\Export\Request
 *
 * @method static Type EXPORT(string $description = null)
 * @method static Type EDIT(string $description = null)
 * @method static Type DELETE(string $description = null)
 */
final class Type extends Dictionary
{
    public const EXPORT = 'i';
    public const EDIT = 'u';
    public const DELETE = 'd';
}
