<?php

namespace Wearesho\Bobra\Ubki\Push\Export;

use Wearesho\Bobra\Ubki\Data;

/**
 * Trait RequestTrait
 * @package Wearesho\Bobra\Ubki\Push\Export
 */
trait RequestTrait
{
    /** @var Request\Data */
    protected $head;

    /** @var DataDocumentInterface */
    protected $body;

    public function getHead(): Data\RequestHead
    {
        return $this->head;
    }

    public function getBody(): DataDocumentInterface
    {
        return $this->body;
    }
}
