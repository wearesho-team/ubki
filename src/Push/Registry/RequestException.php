<?php

namespace Wearesho\Bobra\Ubki\Push\Registry;

/**
 * Class RequestException
 *
 * @package Wearesho\Bobra\Ubki\Push\Registry
 */
class RequestException extends \Exception
{
    /** @var string */
    protected $errors;

    public function __construct(
        string $errors,
        int $code = 0,
        \Throwable $previous = null
    ) {
        $this->errors = $errors;

        parent::__construct('Request errors: ' . $errors, $code, $previous);
    }

    public function getRequest(): string
    {
        return $this->errors;
    }
}
