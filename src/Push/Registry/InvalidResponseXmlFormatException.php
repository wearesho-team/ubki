<?php

namespace Wearesho\Bobra\Ubki\Push\Registry;

/**
 * Class InvalidResponseXmlFormatException
 * @package Wearesho\Bobra\Ubki\Push\Registry
 */
class InvalidResponseXmlFormatException extends \Exception
{
    /** @var string */
    protected $response;

    public function __construct(
        string $response,
        int $code = 0,
        \Throwable $previous = null
    ) {
        $this->response = $response;

        parent::__construct("Response file have invalid xml format: \n{$response}", $code, $previous);
    }

    public function getResponse(): string
    {
        return $this->response;
    }
}
