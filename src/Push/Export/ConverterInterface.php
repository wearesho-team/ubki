<?php

namespace Wearesho\Bobra\Ubki\Push\Export;

/**
 * Interface ConverterInterface
 * @package Wearesho\Bobra\Ubki\Push\Export
 */
interface ConverterInterface
{
    public function dataDocumentToXml(DataDocumentInterface $report): \DOMDocument;
}
