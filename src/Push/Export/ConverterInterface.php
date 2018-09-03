<?php

namespace Wearesho\Bobra\Ubki\Push\Export;

use Wearesho\Bobra\Ubki\Blocks\Interfaces;

/**
 * Interface ConverterInterface
 * @package Wearesho\Bobra\Ubki\Push\Export
 */
interface ConverterInterface
{
    public const DOC_ROOT = 'doc';
    public const UBKI_ROOT = 'ubki';
    public const SESSION_ID = 'sessid';
    public const REQUEST_ENVELOPE = 'req_envelope';
    public const REQUEST_XML = 'req_xml';

    public function dataDocumentToXml(
        Interfaces\RequestData $requestData,
        DataDocumentInterface $report,
        string $sessionId
    ): \DOMDocument;
}
