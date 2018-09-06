<?php

namespace Wearesho\Bobra\Ubki\Pull;

use Wearesho\Bobra\Ubki\Blocks\Interfaces;
use Wearesho\Bobra\Ubki\ElementInterface;
use Wearesho\Bobra\Ubki\Pull\Elements\RequestContent;

/**
 * Interface RequestInterface
 * @package Wearesho\Bobra\Ubki\Pull
 */
interface RequestInterface extends ElementInterface
{
    public const TAG = 'doc';
    public const UBKI_BLOCK = 'ubki';
    public const SESSION_ID = 'sessid';
    public const REQ_ENVELOPE_BLOCK = 'req_envelope';

    public function getHead(): Interfaces\RequestData;

    public function getBody(): RequestContent;
}
