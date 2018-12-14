<?php

namespace Wearesho\Bobra\Ubki\Pull;

use Wearesho\Bobra\Ubki;

/**
 * Trait RequestTrait
 * @package Wearesho\Bobra\Ubki\Pull
 */
trait RequestTrait
{

    /** @var Ubki\Data\Elements\RequestData */
    protected $head;

    /** @var Elements\RequestContentInterface */
    protected $body;

    public function getHead(): Ubki\Data\Interfaces\RequestData
    {
        return $this->head;
    }

    public function getBody(): Elements\RequestContentInterface
    {
        return $this->body;
    }
}
