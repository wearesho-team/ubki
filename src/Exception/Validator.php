<?php

declare(strict_types=1);

namespace Wearesho\Bobra\Ubki\Exception;

use Wearesho\Bobra\Ubki;

/**
 * Class ValidatorTrait
 * @package Wearesho\Bobra\Ubki\Exception
 */
class Validator extends \InvalidArgumentException implements Ubki\ExceptionInterface
{
    public function __construct(
        Ubki\Validator $regular,
        string $message = \null,
        $code = 0,
        \Throwable $previous = \null
    ) {
        parent::__construct(
            "Validation exception with value: [{$message}] on regular [{$regular->getKey()}]",
            $code,
            $previous
        );
    }
}
