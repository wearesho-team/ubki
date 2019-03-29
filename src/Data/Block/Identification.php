<?php

namespace Wearesho\Bobra\Ubki\Data\Block;

use Wearesho\Bobra\Ubki;

/**
 * Class Identification
 * @package Wearesho\Bobra\Ubki\Data\Block
 */
class Identification extends Ubki\Block
{
    public const ID = 1;

    /** @var Ubki\Data\Credential */
    protected $credential;

    public function __construct(Ubki\Data\Credential $credential)
    {
        $this->credential = $credential;
    }
    public function getCredential(): Ubki\Data\Credential
    {
        return $this->credential;
    }
}
