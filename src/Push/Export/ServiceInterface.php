<?php

namespace Wearesho\Bobra\Ubki\Push\Export;

/**
 * Interface ServiceInterface
 * @package Wearesho\Bobra\Ubki\Push\Export
 */
interface ServiceInterface
{
    public function send(DataDocumentInterface $document): Response;
}
