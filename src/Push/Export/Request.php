<?php

namespace Wearesho\Bobra\Ubki\Push\Export;

use Wearesho\Bobra\Ubki;

/**
 * Class Request
 * @package Wearesho\Bobra\Ubki\Push\Export
 */
class Request extends Ubki\Element implements RequestInterface
{
    use RequestTrait;

    public const TAG = 'doc';

    public function __construct(Request\Data $head, DataDocumentInterface $body)
    {
        $this->head = $head;
        $this->body = $body;
    }
}
