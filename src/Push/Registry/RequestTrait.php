<?php

namespace Wearesho\Bobra\Ubki\Push\Registry;

/**
 * Trait RequestTrait
 *
 * @package Wearesho\Bobra\Ubki\Push\Registry
 */
trait RequestTrait
{
    /** @var string */
    protected $todo;

    /** @var \DateTimeInterface */
    protected $indate;

    /** @var string */
    protected $idout;

    /** @var string */
    protected $idalien;

    /**
     * @inheritdoc
     */
    public function getRegistryType(): string
    {
        return $this->todo;
    }

    /**
     * @inheritdoc
     */
    public function getOperationDate(): \DateTimeInterface
    {
        return $this->indate;
    }

    /**
     * @inheritdoc
     */
    public function getUbkiId(): string
    {
        return $this->idout;
    }

    /**
     * @inheritdoc
     */
    public function getPartnerId(): string
    {
        return $this->idalien;
    }
}
