<?php

namespace Wearesho\Bobra\Ubki\Push\Registry\Response;

use MyCLabs\Enum\Enum;

/**
 * Class State
 * Transmission Packet Status
 *
 * @method static static PROCESSED()
 * @method static static TRANSMITTED()
 * @method static static CREATED()
 * @method static static BLOCKED()
 * @method static static SQL_ERROR()
 *
 * @package Wearesho\Bobra\Ubki\Push\Registry\Response
 *
 * @deprecated
 */
class State extends Enum
{
    public const PROCESSED = 'r';
    public const TRANSMITTED = 'n';
    public const CREATED = 'i';
    public const BLOCKED = 'b';
    public const SQL_ERROR = 'e';
}
