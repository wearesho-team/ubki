<?php

namespace Wearesho\Bobra\Ubki\Push\Export;

/**
 * Class FormerException
 * @package Wearesho\Bobra\Ubki\Push\Export
 */
class FormerException extends \Exception
{
    protected $request;

    public function __construct(
        RequestInterface $request = null,
        string $message = "",
        int $code = 0,
        \Throwable $previous = null
    ) {
        $this->request = $request;

        parent::__construct($message, $code, $previous);
    }

    public function getRequest()
    {
        return $this->request;
    }
}
