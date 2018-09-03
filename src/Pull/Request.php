<?php

namespace Wearesho\Bobra\Ubki\Pull;

use Wearesho\Bobra\Ubki\Blocks\Interfaces;

/**
 * Class Request
 * @package Wearesho\Bobra\Ubki\Pull
 */
class Request implements RequestInterface
{
    /** @var Interfaces\RequestData */
    protected $head;

    /** @var IdentificationData */
    protected $body;

    public function __construct(Interfaces\RequestData $requestData, IdentificationDataInterface $identificationData)
    {
        $this->head = $requestData;
        $this->body = $identificationData;
    }

    public function getHead(): Interfaces\RequestData
    {
        return $this->head;
    }

    public function getBody(): IdentificationData
    {
        return $this->body;
    }
}
