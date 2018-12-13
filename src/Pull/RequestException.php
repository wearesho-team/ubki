<?php

namespace Wearesho\Bobra\Ubki\Pull;

/**
 * Class RequestException
 * @package Wearesho\Bobra\Ubki\Pull
 */
class RequestException extends \Exception
{
    /** @var RequestInterface */
    protected $request;

    public function __construct(
        RequestInterface $request,
        string $message = "",
        int $code = 0,
        \Throwable $previous = null
    ) {
        $this->request = $request;

        parent::__construct($message, $code, $previous);
    }

    public function getRequest(): RequestInterface
    {
        return $this->request;
    }
}
