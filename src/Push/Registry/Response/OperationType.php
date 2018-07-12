<?php

namespace Wearesho\Bobra\Ubki\Push\Registry\Response;

/**
 * Interface OperationType
 * Transferring operation type
 *
 * @package Wearesho\Bobra\Ubki\Push\Registry\Response
 */
interface OperationType
{
    public const TRANSFERRING = 'i';
    public const EDITING = 'u';
    public const DELETING = 'd';
}
