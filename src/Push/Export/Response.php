<?php

namespace Wearesho\Bobra\Ubki\Push\Export;

/**
 * Class Response
 * @package Wearesho\Bobra\Ubki\Push\Export
 */
class Response implements ResponseInterface
{
    use ResponseTrait;

    public function __construct(
        string $ubkiId,
        string $status,
        ?string $internalError = null,
        ?string $internalMessage = null,
        ?ErrorCollection $errors = null
    ) {
        $this->ubkiId = $ubkiId;
        $this->status = $status;
        $this->internalError = $internalError;
        $this->internalMessage = $internalMessage;
        $this->errors = $errors;
    }
}
