<?php

namespace Wearesho\Bobra\Ubki\Blocks;

use Wearesho\Bobra\Ubki\Block;
use Wearesho\Bobra\Ubki\Blocks\Entities\PassportMVD;

/**
 * Class PassportMVDInformation
 * @package Wearesho\Bobra\Ubki\Blocks
 */
class PassportMVDInformation extends Block
{
    public const ID = 5;

    /** @var PassportMVD */
    protected $passportMVD;

    /**
     * PassportMVDInformation constructor.
     *
     * @param PassportMVD $passportMVD
     */
    public function __construct(PassportMVD $passportMVD)
    {
        $this->passportMVD = $passportMVD;
    }

    public function jsonSerialize(): array
    {
        return [
            'passportMVD' => $this->getPassportMVD()->jsonSerialize(),
        ];
    }

    public function getPassportMVD(): PassportMVD
    {
        return $this->passportMVD;
    }
}
