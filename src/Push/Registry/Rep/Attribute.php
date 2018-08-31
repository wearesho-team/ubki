<?php

namespace Wearesho\Bobra\Ubki\Push\Registry\Rep;

use Wearesho\Bobra\Ubki\Push\Registry;

/**
 * Interface Attribute
 * @package Wearesho\Bobra\Ubki\Push\Registry\Rep
 */
interface Attribute extends Registry\Attribute
{
    public const STATE = 'state';
    public const OPERATION_TYPE = 'oper';
    public const BLOCK_ID = 'compid';
    public const ITEM = 'item';
    public const REGISTRY_TYPE = 'ertype';
    public const ERROR = 'crytical';
    public const INN = 'inn';
    public const REMARK = 'remark';
}
