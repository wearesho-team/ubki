<?php

namespace Wearesho\Bobra\Ubki\Push\Export;

/**
 * Interface ConverterInterface
 * @package Wearesho\Bobra\Ubki\Push\Export
 */
interface ConverterInterface
{
    public const ROOT = 'ubki';
    public const SESSION_ID = 'sessid';
    public const REQUEST_ENVELOPE = 'req_envelope';
    public const REQUEST_XML = 'req_xml';


    public function dataDocumentToXml(DataDocumentInterface $report): \DOMDocument;
}
