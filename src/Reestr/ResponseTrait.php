<?php

namespace Wearesho\Bobra\Ubki\Reestr;

/**
 * Trait ResponseTrait
 *
 * @package Wearesho\Bobra\Ubki\Reestr
 */
trait ResponseTrait
{
    /** @var string */
    protected $todo;

    /** @var \DateTimeInterface */
    protected $indate;

    /** @var string */
    protected $idout;

    /** @var string */
    protected $idalien;

    /** @var string */
    protected $sessid;

    /** @var string */
    protected $state;

    /** @var string */
    protected $oper;

    /** @var int */
    protected $compid;

    /** @var string */
    protected $item;

    /**
     * @inheritdoc
     */
    public function getTodo(): string
    {
        return $this->todo;
    }

    /**
     * @inheritdoc
     */
    public function getIndate(): \DateTimeInterface
    {
        return $this->indate;
    }

    /**
     * @inheritdoc
     */
    public function getIdout(): string
    {
        return $this->idout;
    }

    /**
     * @inheritdoc
     */
    public function getIdalien(): string
    {
        return $this->idalien;
    }

    /**
     * @inheritdoc
     */
    public function getSessid(): string
    {
        return $this->sessid;
    }

    /**
     * @inheritdoc
     */
    public function getState(): string
    {
        return $this->state;
    }

    /**
     * @inheritdoc
     */
    public function getOper(): string
    {
        return $this->oper;
    }

    /**
     * @inheritdoc
     */
    public function getCompid(): int
    {
        return $this->compid;
    }

    /**
     * @inheritdoc
     */
    public function getItem(): string
    {
        return $this->item;
    }
}
