<?php

namespace Wearesho\Bobra\Ubki\Push;

use Wearesho\Bobra\Ubki\Element;

/**
 * Class Error
 * @package Wearesho\Bobra\Ubki\Push
 */
class Error extends Element implements \JsonSerializable
{
    public const ROOT = 'tech';
    public const PARENT_TAG = 'sentdatainfo';
    public const TAG = 'item';

    public const ATTR_BLOCK_ID = 'compid';
    public const ATTR_TAG = 'tag';
    public const ATTR_ATTRIBUTE = 'attr';
    public const ATTR_TYPE = 'code';
    public const ATTR_MESSAGE = 'msg';
    public const PASSED_STRINGS = 'ok';
    public const ERROR_STRINGS = 'er';

    /** @var int */
    protected $blockId;

    /** @var string */
    protected $tag;

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
        ?int $passedStringsCount,
        ?int $errorStringsCount
    ) {
        $this->blockId = $blockId;
        $this->tag = $tag;
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
            'tag' => $this->tag,
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

    public function getTag(): string
    {
        return $this->tag;
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
