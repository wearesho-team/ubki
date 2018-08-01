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
    protected $registryType;

    /** @var string */
    protected $errorType;

    /** @var string */
    protected $inn;

    /** @var string */
    protected $remark;

    /**
     * @inheritdoc
     */
    public function getRegistryType(): string
    {
        return $this->registryType;
    }

    /**
     * @inheritdoc
     */
    public function getErrorType(): string
    {
        return $this->errorType;
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
