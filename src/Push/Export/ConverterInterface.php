<?php

namespace Wearesho\Bobra\Ubki\Push\Export;

/**
 * Interface ConverterInterface
 * @package Wearesho\Bobra\Ubki\Push\Export
 */
interface ConverterInterface
{
    public function xmlToDataDocument(string $xml): DataDocumentInterface;

    public function xmlToResponse(string $xml): Response;

    public function dataDocumentToXml(DataDocumentInterface $document): string;
}
