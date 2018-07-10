<?php

namespace Wearesho\Bobra\Ubki\Push\Registry;

/**
 * Class UnsupportedRequestException
 *
 * @package Wearesho\Bobra\Ubki\Push\Registry
 */
class UnsupportedRequestException extends \InvalidArgumentException
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
