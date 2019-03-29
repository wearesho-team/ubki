<?php

namespace Wearesho\Bobra\Ubki\Push\Export;

use Wearesho\Bobra\Ubki;

/**
 * Class Request
 * @package Wearesho\Bobra\Ubki\Push\Export
 */
class Request extends Ubki\Infrastructure\Element implements RequestInterface
{
    use RequestTrait;

    public const TAG = 'doc';

    public function __construct(Ubki\Data\Interfaces\RequestData $head, DataDocumentInterface $body)
    {
        $this->head = $head;
        $this->body = $body;
    }
}
