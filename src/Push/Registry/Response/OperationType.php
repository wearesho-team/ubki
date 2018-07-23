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

    /**
     * @param string $operationType
     *
     * @return OperationType
     * @throws \InvalidArgumentException
     */
    public static function instanceByValue(string $operationType): OperationType
    {
        switch ($operationType) {
            case static::TRANSFERRING:
                return OperationType::TRANSFERRING();
            case static::EDITING:
                return OperationType::EDITING();
            case static::DELETING:
                return OperationType::DELETING();
            default:
                throw new \InvalidArgumentException('Invalid state: ' . $operationType);
        }
    }
}
