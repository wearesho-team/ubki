<?php

namespace Wearesho\Bobra\Ubki\Reestr\Bil;

/**
 * Trait RequestTrait
 *
 * @package Wearesho\Bobra\Ubki\Reestr\Bil
 */
trait RequestTrait
{
    /** @var string */
    protected $grp;

    /**
     * @inheritdoc
     */
    public function getGrp(): string
    {
        return $this->grp;
    }
}
