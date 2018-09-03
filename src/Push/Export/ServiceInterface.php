<?php

namespace Wearesho\Bobra\Ubki\Push\Export;

use Wearesho\Bobra\Ubki\Blocks\Interfaces\RequestData;

/**
 * Interface ServiceInterface
 * @package Wearesho\Bobra\Ubki\Push\Export
 */
interface ServiceInterface
{
    public function send(RequestData $reportTechData, DataDocumentInterface $document): Response;
}
