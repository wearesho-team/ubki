<?php

namespace Wearesho\Bobra\Ubki\Exception;

use Wearesho\Bobra\Ubki;

/**
 * Class Former
 * @package Wearesho\Bobra\Ubki\Exception
 */
class Former extends \RuntimeException
{
    /** @var Ubki\RequestInterface */
    protected $request;

    /** @var Ubki\FormerInterface */
    protected $former;

    public function __construct(
        Ubki\RequestInterface $request,
        Ubki\FormerInterface $former,
        string $message = "",
        int $code = 0,
        \Throwable $previous = null
    ) {
        $this->request = $request;
        $this->former = $former;

        parent::__construct($message, $code, $previous);
    }

    public function getRequest(): Ubki\RequestInterface
    {
        return $this->request;
    }

    public function getFormer(): Ubki\FormerInterface
    {
        return $this->former;
    }
}
