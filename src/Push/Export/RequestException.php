<?php

namespace Wearesho\Bobra\Ubki\Push\Export;

/**
 * Class RequestException
 * @package Wearesho\Bobra\Ubki\Push\Export
 */
class RequestException extends \Exception
{
    /** @var Request */
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

    public function getRequest(): Request
    {
        return $this->request;
    }
}
