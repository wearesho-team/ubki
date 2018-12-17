<?php

namespace Wearesho\Bobra\Ubki\Pull;

use Wearesho\Bobra\Ubki;

/**
 * Trait RequestTrait
 * @package Wearesho\Bobra\Ubki\Pull
 */
trait RequestTrait
{

    /** @var Ubki\Data\Element\RequestData */
    protected $head;

    /** @var Element\RequestContentInterface */
    protected $body;

    public function getHead(): Ubki\Data\Interfaces\RequestData
    {
        return $this->head;
    }

    public function getBody(): Element\RequestContentInterface
    {
        return $this->body;
    }
}
