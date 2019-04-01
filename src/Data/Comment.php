<?php

namespace Wearesho\Bobra\Ubki\Data;

/**
 * Class Comment
 * @package Wearesho\Bobra\Ubki\Data
 */
class Comment
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

    public function getId(): ?string
    {
        return $this->id;
    }

    public function getText(): string
    {
        return $this->text;
    }
}
