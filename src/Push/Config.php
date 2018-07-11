<?php

namespace Wearesho\Bobra\Ubki\Push;

use Wearesho\Bobra\Ubki;

/**
 * Class Config
 *
 * @package Wearesho\Bobra\Ubki\Push
 */
class Config implements ConfigInterface
{
    use Ubki\Authorization\ConfigTrait;
    use ConfigTrait;

    public function __construct(string $username, string $password, int $mode)
    {
        $this->validateMode($mode);

        $this->username = $username;
        $this->password = $password;
        $this->mode = $mode;
    }

    protected function validateMode(int $mode): void
    {
        $isValid =
            $mode === static::MODE_PRODUCTION ||
            $mode === static::MODE_TEST;

        if (!$isValid) {
            throw new Ubki\UnsupportedModeException($mode);
        }
    }
}
