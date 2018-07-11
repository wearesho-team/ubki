<?php

namespace Wearesho\Bobra\Ubki\Push\Registry;

/**
 * Class RequestException
 *
 * @package Wearesho\Bobra\Ubki\Push\Registry
 */
class RequestException extends \Exception
{
    /** @var string */
    protected $request;

    public function __construct(
        string $request,
        int $code = 0,
        \Throwable $previous = null
    ) {
        $this->request = $request;

        parent::__construct('Reuest errors: ' . $request, $code, $previous);
    }

    public function getRequest(): string
    {
        return $this->request;
    }
}
