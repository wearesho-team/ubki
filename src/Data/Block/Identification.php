<?php

namespace Wearesho\Bobra\Ubki\Data\Block;

use Wearesho\Bobra\Ubki;

/**
 * Class Identification
 * @package Wearesho\Bobra\Ubki\Data\Block
 */
class Identification extends Ubki\Block implements Ubki\Data\Interfaces\Identification
{
    use Ubki\Data\Traits\Identification;

    public const ID = 1;

    public function __construct(Ubki\Data\Interfaces\Credential $credential)
    {
        $this->credential = $credential;
    }
}
