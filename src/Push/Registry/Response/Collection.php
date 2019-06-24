<?php

namespace Wearesho\Bobra\Ubki\Push\Registry\Response;

use Wearesho\BaseCollection;
use Wearesho\Bobra\Ubki\Push\Registry;

/**
 * Class Collection
 * @package Wearesho\Bobra\Ubki\Push\Registry\Response
 */
final class Collection extends BaseCollection
{
    public function type(): string
    {
        return Registry\ResponseInterface::class;
    }
}
