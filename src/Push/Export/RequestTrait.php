<?php

namespace Wearesho\Bobra\Ubki\Push\Export;

use Wearesho\Bobra\Ubki\Blocks\Interfaces;

/**
 * Trait RequestTrait
 * @package Wearesho\Bobra\Ubki\Push\Export
 */
trait RequestTrait
{
    /** @var Interfaces\RequestData */
    protected $head;

    /** @var DataDocumentInterface */
    protected $body;

    public function getHead(): Interfaces\RequestData
    {
        return $this->head;
    }

    public function getBody(): DataDocumentInterface
    {
        return $this->body;
    }
}
