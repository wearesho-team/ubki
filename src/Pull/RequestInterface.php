<?php

namespace Wearesho\Bobra\Ubki\Pull;

use Wearesho\Bobra\Ubki\Blocks\Interfaces;

/**
 * Interface RequestInterface
 * @package Wearesho\Bobra\Ubki\Pull
 */
interface RequestInterface
{
    public const TAG = 'doc';
    public const UBKI_BLOCK = 'ubki';
    public const SESSION_ID = 'sessid';
    public const REQ_ENVELOPE_BLOCK = 'req_envelope';

    public function getHead(): Interfaces\RequestData;

    public function getBody(): IdentificationData;
}
