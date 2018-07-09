<?php

namespace Wearesho\Bobra\Ubki\Push\Registry\Response;

/**
 * Interface Oper
 * Transferring operation type
 *
 * @package Wearesho\Bobra\Ubki\Push\Registry\Response
 */
interface Oper
{
    public const TRANSFERRING = 'i';
    public const EDITING = 'u';
    public const DELETING = 'd';
}
