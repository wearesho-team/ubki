<?php

namespace Wearesho\Bobra\Ubki\Pull;

use Wearesho\Bobra\Ubki;

/**
 * Class Request
 * @package Wearesho\Bobra\Ubki\Pull
 *
 * @method Ubki\Pull\Request\Head getHead()
 */
class Request implements Ubki\RequestInterface
{
    use RequestTrait;

    public function __construct(
        Request\Head $requestData,
        Element\RequestContentInterface $content
    ) {
        $this->validateReason($requestData, $content);

        $this->head = $requestData;
        $this->body = $content;
    }
}
