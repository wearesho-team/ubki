<?php

namespace Wearesho\Bobra\Ubki\Push\Registry\Response;

use Wearesho\Bobra\Ubki\Dictionary;

/**
 * Class State
 * Transmission Packet Status
 *
 * @package Wearesho\Bobra\Ubki\Push\Registry\Response
 *
 * @method static State PROCESSED()
 * @method static State TRANSMITTED()
 * @method static State CREATED()
 * @method static State BLOCKED()
 * @method static State SQL_ERROR()
 */
final class State extends Dictionary
{
    public const PROCESSED = 'r';
    public const TRANSMITTED = 'n';
    public const CREATED = 'i';
    public const BLOCKED = 'b';
    public const SQL_ERROR = 'e';
}
