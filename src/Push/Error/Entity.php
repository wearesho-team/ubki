<?php

namespace Wearesho\Bobra\Ubki\Push\Error;

use Wearesho\Bobra\Ubki\Element;

/**
 * Class Entity
 * @package Wearesho\Bobra\Ubki\Push\Error
 *
 * @property-read int      $blockId
 * @property-read string   $tag
 * @property-read string   $attribute
 * @property-read string   $type
 * @property-read string   $message
 * @property-read int|null $passedStringsCount
 * @property-read int|null $errorStringsCount
 */
class Entity extends Element implements \JsonSerializable
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

    public function __construct(
        int $blockId,
        string $tag,
        string $attribute,
        string $type,
        string $message,
        ?int $passedStringsCount = null,
        ?int $errorStringsCount = null
    ) {
        parent::__construct([
            'blockId' => $blockId,
            'tag' => $tag,
            'attribute' => $attribute,
            'type' => $type,
            'message' => $message,
            'passedStringsCount' => $passedStringsCount,
            'errorStringsCount' => $errorStringsCount
        ]);
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
}
