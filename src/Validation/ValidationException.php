<?php

namespace Wearesho\Bobra\Ubki\Validation;

/**
 * Class ValidationException
 * @package Wearesho\Bobra\Ubki
 */
class ValidationException extends \InvalidArgumentException
{
    /** @var string */
    protected $value;

    public function __construct(
        string $value,
        string $message = "",
        int $code = 0,
        \Throwable $previous = null
    ) {
        $this->value = $value;

        parent::__construct($message, $code, $previous);
    }

    public function getValue(): string
    {
        return $this->value;
    }
}
