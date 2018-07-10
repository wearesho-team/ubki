<?php

namespace Wearesho\Bobra\Ubki\Push\Registry;

/**
 * Class InvalidRequestTypeException
 *
 * @package Wearesho\Bobra\Ubki\Push\Registry
 */
class InvalidRequestTypeException extends \InvalidArgumentException
{
    /** @var string */
    protected $type;

    public function __construct(
        string $type,
        int $code = 0,
        \Throwable $previous = null
    ) {
        $this->type = $type;

        parent::__construct("Request type have invalid value: {$type}", $code, $previous);
    }

    public function getType(): string
    {
        return $this->type;
    }
}
