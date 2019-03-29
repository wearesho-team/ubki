<?php

namespace Wearesho\Bobra\Ubki\Infrastructure;

/**
 * Interface FormerInterface
 * @package Wearesho\Bobra\Ubki\Infrastructure
 */
interface FormerInterface
{
    public const DOC_ROOT = 'doc';
    public const UBKI_ROOT = 'ubki';
    public const ATTRIBUTE_SESSION_ID = 'sessid';
    public const REQUEST_ENVELOPE = 'req_envelope';
    public const REQUEST_XML = 'req_xml';

    /**
     * @param RequestInterface $request
     * @param string $sessionId
     *
     * @return string
     * @throws \Wearesho\Bobra\Ubki\Exception\Former
     */
    public function form(RequestInterface $request, string $sessionId): string;
}
