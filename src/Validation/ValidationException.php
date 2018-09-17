<?php

namespace Wearesho\Bobra\Ubki\Validation;

/**
 * Class ValidationException
 * @package Wearesho\Bobra\Ubki
 */
class ValidationException extends \InvalidArgumentException
{
    /** @var string */
    protected $attribute;

    public function __construct(string $attribute, string $message = "", int $code = 0, \Throwable $previous = null)
    {
        $this->attribute = $attribute;

        parent::__construct($message, $code, $previous);
    }

    public function getAttribute(): string
    {
        return $this->attribute;
    }
}
