<?php

namespace Wearesho\Bobra\Ubki\Push\Export;

use Wearesho\Bobra\Ubki\Blocks\Interfaces;

/**
 * Class Request
 * @package Wearesho\Bobra\Ubki\Push\Export
 */
class Request implements RequestInterface
{
    use RequestTrait;

    public function __construct(Interfaces\RequestData $head, DataDocumentInterface $body)
    {
        $this->head = $head;
        $this->body = $body;
    }
}
