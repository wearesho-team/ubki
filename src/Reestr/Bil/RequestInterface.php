<?php

namespace Wearesho\Bobra\Ubki\Reestr\Bil;

use Wearesho\Bobra\Ubki\Reestr;

/**
 * Interface RequestInterface
 *
 * @package Wearesho\Bobra\Ubki\Reestr\Bil
 */
interface RequestInterface extends Reestr\RequestInterface
{
    /**
     * Grouping type
     *
     * @return string
     */
    public function getGrp(): string;
}
