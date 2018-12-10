<?php

namespace Wearesho\Bobra\Ubki\Push\Export;

use Wearesho\Bobra\Ubki;

/**
 * Interface FormerInterface
 * @package Wearesho\Bobra\Ubki\Push\Export
 */
interface FormerInterface extends Ubki\Infrastructure\FormerInterface
{
    public const DOC_ROOT = 'doc';
    public const UBKI_ROOT = 'ubki';
    public const ATTRIBUTE_SESSION_ID = 'sessid';
    public const REQUEST_ENVELOPE = 'req_envelope';
    public const REQUEST_XML = 'req_xml';

    public function __construct(
        Ubki\Data\Interfaces\RequestData $requestData,
        DataDocumentInterface $report,
        string $sessionId
    );
}
