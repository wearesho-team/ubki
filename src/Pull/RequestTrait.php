<?php

namespace Wearesho\Bobra\Ubki\Pull;

use Wearesho\Bobra\Ubki;

/**
 * Trait RequestTrait
 * @package Wearesho\Bobra\Ubki\Pull
 */
trait RequestTrait
{

    /** @var Ubki\Data\RequestHead */
    protected $head;

    /** @var Element\RequestContentInterface */
    protected $body;

    public function getHead(): Ubki\Data\RequestHead
    {
        return $this->head;
    }

    public function getBody(): Element\RequestContentInterface
    {
        return $this->body;
    }
}
