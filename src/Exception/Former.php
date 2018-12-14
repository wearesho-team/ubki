<?php

namespace Wearesho\Bobra\Ubki\Exception;

use Wearesho\Bobra\Ubki\Infrastructure;

/**
 * Class Former
 * @package Wearesho\Bobra\Ubki\Exception
 */
class Former extends \RuntimeException
{
    /** @var Infrastructure\RequestInterface */
    protected $request;

    /** @var Infrastructure\FormerInterface */
    protected $former;

    public function __construct(
        Infrastructure\RequestInterface $request,
        Infrastructure\FormerInterface $former,
        string $message = "",
        int $code = 0,
        \Throwable $previous = null
    ) {
        $this->request = $request;
        $this->former = $former;

        parent::__construct($message, $code, $previous);
    }

    public function getRequest(): Infrastructure\RequestInterface
    {
        return $this->request;
    }

    public function getFormer(): Infrastructure\FormerInterface
    {
        return $this->former;
    }
}
