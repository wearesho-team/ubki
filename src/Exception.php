<?php

namespace Wearesho\Bobra\Ubki;

/**
 * Class Exception
 * @package Wearesho\Bobra\Ubki
 */
class Exception extends \Exception implements ExceptionInterface
{
    public const CODE_UNKNOWN_ERROR = -1;
    public const CODE_INVALID_ANSWER = -2;

    /** @var string|null */
    protected $publicMessage;

    public function __construct(
        string $message = "",
        int $code = 0,
        \Throwable $previous = null,
        string $publicMessage = null
    ) {
        parent::__construct($message, $code, $previous);
        $this->publicMessage = $publicMessage;
    }

    /**
     * Текст ошибки для клиентов
     * @return null|string
     */
    public function getPublicMessage(): ?string
    {
        return $this->publicMessage;
    }
}
