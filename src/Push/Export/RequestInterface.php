<?php

namespace Wearesho\Bobra\Ubki\Push\Export;

use Wearesho\Bobra\Ubki\Blocks\Interfaces;

/**
 * Interface RequestInterface
 * @package Wearesho\Bobra\Ubki\Push\Export
 */
interface RequestInterface extends \Wearesho\Bobra\Ubki\RequestInterface
{
    public function getHead(): Interfaces\RequestData;

    public function getBody(): DataDocumentInterface;
}
