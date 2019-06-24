<?php

namespace Wearesho\Bobra\Ubki\Push\Export;

use Wearesho\Bobra\Ubki;

/**
 * Trait RequestTrait
 * @package Wearesho\Bobra\Ubki\Push\Export
 */
trait RequestTrait
{
    /** @var Request\Head */
    protected $head;

    /** @var Request\Body */
    protected $body;

    public function getHead(): Ubki\Data\RequestHead
    {
        return $this->head;
    }

    public function getBody(): Request\Body
    {
        return $this->body;
    }
}
