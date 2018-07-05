<?php

namespace Wearesho\Bobra\Ubki\Reestr\Bil;

/**
 * Trait ResponseTrait
 *
 * @package Wearesho\Bobra\Ubki\Reestr\Bil
 */
trait ResponseTrait
{
    /** @var int */
    protected $al;

    /** @var int */
    protected $nw;

    /** @var int */
    protected $ed;

    /** @var int */
    protected $er;

    /** @var int */
    protected $db;

    /** @var int */
    protected $lb;

    /** @var int */
    protected $dl;

    /**
     * @inheritdoc
     */
    public function getAl(): int
    {
        return $this->al;
    }

    /**
     * @inheritdoc
     */
    public function getNw(): int
    {
        return $this->nw;
    }

    /**
     * @inheritdoc
     */
    public function getEd(): int
    {
        return $this->ed;
    }

    /**
     * @inheritdoc
     */
    public function getEr(): int
    {
        return $this->er;
    }

    /**
     * @inheritdoc
     */
    public function getDb(): int
    {
        return $this->db;
    }

    /**
     * @inheritdoc
     */
    public function getLb(): int
    {
        return $this->lb;
    }

    /**
     * @inheritdoc
     */
    public function getDl(): int
    {
        return $this->dl;
    }
}
