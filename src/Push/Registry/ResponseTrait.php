<?php

namespace Wearesho\Bobra\Ubki\Push\Registry;

use Wearesho\Bobra\Ubki\Push\Registry\Response;

/**
 * Trait ResponseTrait
 * @package Wearesho\Bobra\Ubki\Push\Registry
 */
trait ResponseTrait
{
    /** @var string */
    protected $type;

    /** @var \DateTimeInterface */
    protected $exportDate;

    /** @var string */
    protected $ubkiId;

    /** @var string */
    protected $partnerId;

    /** @var string */
    protected $sessionId;

    /** @var Response\State */
    protected $state;

    /** @var Response\OperationType */
    protected $operationType;

    /** @var int */
    protected $blockId;

    /** @var string */
    protected $item;

    /**
     * @inheritdoc
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @inheritdoc
     */
    public function getExportDate(): \DateTimeInterface
    {
        return $this->exportDate;
    }

    /**
     * @inheritdoc
     */
    public function getUbkiId(): string
    {
        return $this->ubkiId;
    }

    /**
     * @inheritdoc
     */
    public function getPartnerId(): string
    {
        return $this->partnerId;
    }

    /**
     * @inheritdoc
     */
    public function getSessionId(): string
    {
        return $this->sessionId;
    }

    /**
     * @inheritdoc
     */
    public function getState(): Response\State
    {
        return $this->state;
    }

    /**
     * @inheritdoc
     */
    public function getOperationType(): Response\OperationType
    {
        return $this->operationType;
    }

    /**
     * @inheritdoc
     */
    public function getBlockId(): int
    {
        return $this->blockId;
    }

    /**
     * @inheritdoc
     */
    public function getItem(): string
    {
        return $this->item;
    }
}
