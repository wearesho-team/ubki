<?php

namespace Wearesho\Bobra\Ubki\Push\Export;

use Wearesho\Bobra\Ubki;

/**
 * Class Request
 * @package Wearesho\Bobra\Ubki\Push\Export
 *
 * @method Ubki\Push\Export\Request\Head getHead()
 * @method Ubki\Push\Export\Request\Body getBody()
 */
class Request implements RequestInterface
{
    use RequestTrait;

    public const TAG = 'doc';

    public function __construct(Request\Head $head, Request\Body $body)
    {
        $this->head = $head;
        $this->body = $body;
    }
}
