<?php

namespace Wearesho\Bobra\Ubki\Push\Registry\Response;

/**
 * Interface State
 *
 * @package Wearesho\Bobra\Ubki\Push\Registry\Response
 */
interface State
{
    public const PROCESSED = 'r';
    public const TRANSMITTED = 'n';
    public const CREATED = 'i';
    public const BLOCKED = 'b';
    public const SQL_ERROR = 'e';
}
