<?php

namespace Wearesho\Bobra\Ubki\Push\Export;

use Wearesho\Bobra\Ubki\Blocks\Entities\Trace;

/**
 * Class Response
 * @package Wearesho\Bobra\Ubki\Push\Export
 */
class Response implements ResponseInterface
{
    use ResponseTrait;

    public function __construct(
        Trace $trace,
        string $ubkiId,
        string $status,
        ?string $internalError = null,
        ?string $internalMessage = null,
        ?ErrorCollection $errors = null
    ) {
        $this->trace = $trace;
        $this->ubkiId = $ubkiId;
        $this->status = $status;
        $this->internalError = $internalError;
        $this->internalMessage = $internalMessage;
        $this->errors = $errors;
    }
}
