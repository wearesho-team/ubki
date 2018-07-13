<?php

namespace Wearesho\Bobra\Ubki\Pull\Response;

use Wearesho\Bobra\Ubki;

/**
 * Class ContactCollection
 *
 * @package Wearesho\Bobra\Ubki\Pull\Data
 */
class ContactCollection extends Ubki\BaseCollection
{
    public function type(): string
    {
        return Contact::class;
    }
}
