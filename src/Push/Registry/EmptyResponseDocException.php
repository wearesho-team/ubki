<?php

namespace Wearesho\Bobra\Ubki\Push\Registry;

/**
 * Class EmptyResponseDocException
 * @package Wearesho\Bobra\Ubki\Push\Registry
 */
class EmptyResponseDocException extends \Exception
{
    /** @var string */
    protected $response;

    public function __construct(string $response, string $message = "", int $code = -1, \Throwable $previous = null)
    {
        $this->response = $response;

        parent::__construct($message, $code, $previous);
    }

    public function getResponse(): string
    {
        return $this->response;
    }
}
