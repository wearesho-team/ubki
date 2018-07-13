<?php

namespace Wearesho\Bobra\Ubki\Pull\Response;

use Wearesho\Bobra\Ubki\BaseCollection;

/**
 * Class IdentificationCollection
 * @package Wearesho\Bobra\Ubki\Pull\Response
 */
class IdentificationCollection extends BaseCollection
{
    public function type(): string
    {
        return Identification::class;
    }
}
