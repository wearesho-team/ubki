<?php

namespace Wearesho\Bobra\Ubki;

/**
 * Class NullResponseException
 * @package Wearesho\Bobra\Ubki
 */
class NullResponseException extends \Exception
{
    public function __construct()
    {
        parent::__construct("Response body is null");
    }
}
