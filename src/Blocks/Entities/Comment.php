<?php

namespace Wearesho\Bobra\Ubki\Blocks\Entities;

use Wearesho\Bobra\Ubki\ElementInterface;
use Wearesho\Bobra\Ubki\ElementTrait;

/**
 * Class Comment
 * @package Wearesho\Bobra\Ubki\Blocks\Entities
 */
class Comment implements ElementInterface
{
    use ElementTrait;
    
    public const TAG = 'comment';
    public const ID = 'id';
    public const TEXT = 'text';

    /** @var string|null */
    protected $id;

    /** @var string */
    protected $text;

    public function __construct(string $text, ?string $id = null)
    {
        $this->id = $id;
        $this->text = $text;
    }

    public function jsonSerialize(): array
    {
        return [
            'id' => $this->id,
            'text' => $this->text,
        ];
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
