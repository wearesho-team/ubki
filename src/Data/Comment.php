<?php

declare(strict_types=1);

namespace Wearesho\Bobra\Ubki\Data;

use Wearesho\Bobra\Ubki;

/**
 * Class Comment
 * @package Wearesho\Bobra\Ubki\Data
 *
 * @method static Comment make(...$arguments)
 */
class Comment implements Ubki\Contract\Data\Comment, \JsonSerializable
{
    use Makeable, Tagable;

    /** @var string|null */
    protected $id;

    /** @var string */
    protected $text;

    public function __construct(string $text, string $id = \null)
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

    public static function tag(): string
    {
        return 'comment';
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
