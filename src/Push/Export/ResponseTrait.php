<?php

namespace Wearesho\Bobra\Ubki\Push\Export;

use Wearesho\Bobra\Ubki\Push\Error\Collection;

/**
 * Trait ResponseTrait
 * @package Wearesho\Bobra\Ubki\Push\Export
 */
trait ResponseTrait
{
    /** @var string */
    protected $ubkiId;

    /** @var string */
    protected $status;

    /** @var string|null */
    protected $internalError;

    /** @var string|null */
    protected $internalMessage;

    /** @var Collection|null */
    protected $errors;

    public function getInternalError(): ?string
    {
        return $this->internalError;
    }

    public function getInternalMessage(): ?string
    {
        return $this->internalMessage;
    }

    public function getUbkiId(): string
    {
        return $this->ubkiId;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function getErrors(): ?Collection
    {
        return $this->errors;
    }
}
