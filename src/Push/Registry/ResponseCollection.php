<?php

namespace Wearesho\Bobra\Ubki\Push\Registry;

use Wearesho\BaseCollection;
use Wearesho\Bobra\Ubki\Push\Registry;

/**
 * Class ResponseCollection
 * @package Wearesho\Bobra\Ubki\Push\Registry
 *
 * @method Registry\Rep\Response offsetGet($index)
 */
class ResponseCollection extends BaseCollection
{
    public function type(): string
    {
        return ResponseInterface::class;
    }
}
