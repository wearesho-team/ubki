<?php

namespace Wearesho\Bobra\Ubki\Pull;

use Wearesho\Bobra\Ubki;

/**
 * Interface RequestInterface
 * @package Wearesho\Bobra\Ubki\Pull
 */
interface RequestInterface extends Ubki\Infrastructure\RequestInterface
{
    public const UBKI_BLOCK = 'ubki';
    public const SESSION_ID = 'sessid';
    public const REQ_ENVELOPE_BLOCK = 'req_envelope';

    public function getHead(): Ubki\Data\Interfaces\RequestData;

    public function getBody(): RequestContent;
}
