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
 */
class State extends Enum
{
    public const PROCESSED = 'r';
    public const TRANSMITTED = 'n';
    public const CREATED = 'i';
    public const BLOCKED = 'b';
    public const SQL_ERROR = 'e';

    /**
     * @param string $state
     *
     * @return State
     * @throws \InvalidArgumentException
     */
    public static function instanceByValue(string $state): State
    {
        switch ($state) {
            case static::PROCESSED:
                return State::PROCESSED();
            case static::TRANSMITTED:
                return State::TRANSMITTED();
            case static::CREATED:
                return State::CREATED();
            case static::BLOCKED:
                return State::BLOCKED();
            case static::SQL_ERROR:
                return State::SQL_ERROR();
            default:
                throw new \InvalidArgumentException('Invalid state: ' . $state);
        }
    }
}
