<?php

namespace Wearesho\Bobra\Ubki\Pull;

use Wearesho\Bobra\Ubki;

/**
 * Class Config
 * @package Wearesho\Bobra\Ubki\Pull
 */
class Config implements ConfigInterface
{
    use Ubki\Authorization\ConfigTrait;
    use Ubki\Authorization\ValidateModeTrait;
    use ConfigTrait;

    public function __construct(string $username, string $password, int $mode)
    {
        $this->validateMode($mode);

        $this->username = $username;
        $this->password = $password;
        $this->mode = $mode;
    }
}
