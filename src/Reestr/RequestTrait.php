<?php

namespace Wearesho\Bobra\Ubki\Reestr;

/**
 * Trait RequestTrait
 *
 * @package Wearesho\Bobra\Ubki\Reestr
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
}
