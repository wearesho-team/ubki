<?php

namespace Wearesho\Bobra\Ubki\Push\Export;

use Wearesho\Bobra\Ubki\ElementInterface;
use Wearesho\Bobra\Ubki\ElementTrait;

/**
 * Class Error
 * @package Wearesho\Bobra\Ubki\Push\Export
 */
class Error implements ElementInterface
{
    use ElementTrait;

    public const TAG = 'item';
    public const BLOCK_ID = 'compid';
    public const ERRORED_TAG = 'tag';
    public const ATTRIBUTE = 'attr';
    public const TYPE = 'code';
    public const MESSAGE = 'msg';
    public const PASSED_STRINGS = 'ok';
    public const ERROR_STRINGS = 'er';

    /** @var int */
    protected $blockId;

    /** @var string */
    protected $erroredTag;

    /** @var string */
    protected $attribute;

    /** @var string */
    protected $type;

    /** @var string */
    protected $message;

    /** @var int|null */
    protected $passedStringsCount;

    /** @var int|null */
    protected $errorStringsCount;

    public function __construct(
        int $blockId,
        string $tag,
        string $attribute,
        string $type,
        string $message,
        ?int $passedStringsCount = null,
        ?int $errorStringsCount = null
    ) {
        $this->blockId = $blockId;
        $this->erroredTag = $tag;
        $this->attribute = $attribute;
        $this->type = $type;
        $this->message = $message;
        $this->passedStringsCount = $passedStringsCount;
        $this->errorStringsCount = $errorStringsCount;
    }

    public function jsonSerialize(): array
    {
        return [
            'blockId' => $this->blockId,
            'tag' => $this->erroredTag,
            'attribute' => $this->attribute,
            'type' => $this->type,
            'message' => $this->message,
            'passedStrings' => $this->passedStringsCount,
            'errorString' => $this->errorStringsCount
        ];
    }

    public function getBlockId(): int
    {
        return $this->blockId;
    }

    public function getErroredTag(): string
    {
        return $this->erroredTag;
    }

    public function getAttribute(): string
    {
        return $this->attribute;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function getMessage(): string
    {
        return $this->message;
    }

    public function getPassedStringsCount(): ?int
    {
        return $this->passedStringsCount;
    }

    public function getErrorStringsCount(): ?int
    {
        return $this->errorStringsCount;
    }
}
