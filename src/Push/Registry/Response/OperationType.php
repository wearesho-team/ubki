<?php

namespace Wearesho\Bobra\Ubki\Push\Registry\Response;

use MyCLabs\Enum\Enum;

/**
 * Interface OperationType
 * Transferring operation type
 *
 * @method static static TRANSFERRING()
 * @method static static EDITING()
 * @method static static DELETING()
 *
 * @package Wearesho\Bobra\Ubki\Push\Registry\Response
 */
class OperationType extends Enum
{
    public const TRANSFERRING = 'i';
    public const EDITING = 'u';
    public const DELETING = 'd';
}
