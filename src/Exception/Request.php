<?php

namespace Wearesho\Bobra\Ubki\Exception;

use Wearesho\Bobra\Ubki;

/**
 * Class Request
 * @package Wearesho\Bobra\Ubki\Exception
 */
class Request extends \Exception implements Ubki\ExceptionInterface
{
    /** @var Ubki\RequestInterface */
    protected $request;

    public function __construct(
        Ubki\RequestInterface $request,
        string $message = "",
        int $code = 0,
        \Throwable $previous = null
    ) {
        $this->request = $request;

        parent::__construct($message, $code, $previous);
    }

    public function getRequest(): Ubki\RequestInterface
    {
        return $this->request;
    }
}
