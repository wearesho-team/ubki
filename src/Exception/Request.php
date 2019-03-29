<?php

namespace Wearesho\Bobra\Ubki\Exception;

use Wearesho\Bobra\Ubki\Infrastructure\RequestInterface;

/**
 * Class Request
 * @package Wearesho\Bobra\Ubki\Exception
 */
class Request extends \Exception
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
