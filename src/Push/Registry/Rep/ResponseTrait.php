<?php

namespace Wearesho\Bobra\Ubki\Push\Registry\Rep;

/**
 * Trait ResponseTrait
 *
 * @package Wearesho\Bobra\Ubki\Push\Registry\Rep
 */
trait ResponseTrait
{
    /** @var string */
    protected $ertype;

    /** @var string */
    protected $crytical;

    /** @var string */
    protected $inn;

    /** @var string */
    protected $remark;

    /**
     * @inheritdoc
     */
    public function getRegistryType(): string
    {
        return $this->ertype;
    }

    /**
     * @inheritdoc
     */
    public function getErrorType(): string
    {
        return $this->crytical;
    }

    /**
     * @inheritdoc
     */
    public function getInn(): string
    {
        return $this->inn;
    }

    /**
     * @inheritdoc
     */
    public function getRemark(): string
    {
        return $this->remark;
    }
}
