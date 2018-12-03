<?php

namespace Wearesho\Bobra\Ubki\Data\Elements;

use Wearesho\Bobra\Ubki\Infrastructure;

/**
 * Class Comment
 * @package Wearesho\Bobra\Ubki\Data\Elements
 */
class Comment extends Infrastructure\Element
{
    public const TAG = 'comment';
    public const ID = 'id';
    public const TEXT = 'text';

    /** @var string|null */
    protected $id;

    /** @var string */
    protected $text;

    public function __construct(string $text, string $id = null)
    {
        $this->id = $id;
        $this->text = $text;
    }

    public function jsonSerialize(): array
    {
        return [
            static::ID => $this->id,
            static::TEXT => $this->text,
        ];
    }

    public function tag(): string
    {
        return static::TAG;
    }

    public function getId(): ?string
    {
        return $this->id;
    }

    public function getText(): string
    {
        return $this->text;
    }
}
