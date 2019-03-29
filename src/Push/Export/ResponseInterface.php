<?php

namespace Wearesho\Bobra\Ubki\Push\Export;

use Wearesho\Bobra\Ubki\Push\Error\Collection;

/**
 * Interface ResponseInterface
 * @package Wearesho\Bobra\Ubki\Push\Export
 */
interface ResponseInterface
{
    public const ROOT = 'tech';
    public const ERROR_COLLECTION = 'sentdatainfo';
    public const ID = 'reqid';
    public const STATUS = 'state';
    public const INTERNAL_TAG = 'error';
    public const INTERNAL_ERROR = 'errtype';
    public const INTERNAL_MESSAGE = 'errtext';

    public function getInternalError(): ?string;

    public function getInternalMessage(): ?string;

    public function getUbkiId(): string;

    public function getStatus(): string;

    public function getErrors(): ?Collection;
}
