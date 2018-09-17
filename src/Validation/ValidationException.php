<?php

namespace Wearesho\Bobra\Ubki\Validation;

use Wearesho\Bobra\Ubki\Infrastructure\ElementInterface;

/**
 * Class ValidationException
 * @package Wearesho\Bobra\Ubki
 */
class ValidationException extends \InvalidArgumentException
{
    /** @var ElementInterface */
    protected $element;

    public function __construct(
        ElementInterface $element,
        string $message = "",
        int $code = 0,
        \Throwable $previous = null
    ) {
        $this->element = $element;

        parent::__construct($message, $code, $previous);
    }

    public function getElement(): string
    {
        return $this->element;
    }
}
