<?php

namespace Wearesho\Bobra\Ubki\Blocks\Entities;

use Carbon\Carbon;

use Wearesho\Bobra\Ubki\ElementInterface;
use Wearesho\Bobra\Ubki\ElementTrait;
use Wearesho\Bobra\Ubki\References\Flag;

/**
 * Class CompromisedPhone
 * @package Wearesho\Bobra\Ubki\Blocks\Entities
 * @deprecated
 */
class CompromisedPhone implements ElementInterface
{
    use ElementTrait;

    public const TAG = 'bphone';
    public const FOUND = 'found';
    public const VALUE = 'phone';
    public const TYPE = 'phcodefier';
    public const TYPE_REFERENCE = 'phcodefierref';
    public const COMMENT = 'phcomment';
    public const CREATED_AT = 'phindate';
    
    /** @var Flag */
    protected $found;

    /** @var string */
    protected $value;

    /** @var int */
    protected $type;

    /** @var string */
    protected $comment;

    /** @var Carbon */
    protected $createdAt;

    public function __construct(
        Flag $found,
        string $value,
        int $type,
        string $comment,
        Carbon $createdAt
    ) {
        $this->found = $found;
        $this->value = $value;
        $this->type = $type;
        $this->comment = $comment;
        $this->createdAt = $createdAt;
    }

    public function jsonSerialize(): array
    {
        return [
            'found' => $this->found->__toString(),
            'value' => $this->value,
            'type' => $this->type,
            'comment' => $this->comment,
            'createdAt' => $this->createdAt->toDateString(),
        ];
    }

    public function getFound(): Flag
    {
        return $this->found;
    }

    public function getValue(): string
    {
        return $this->value;
    }

    public function getType(): int
    {
        return $this->type;
    }

    public function getComment(): string
    {
        return $this->comment;
    }

    public function getCreatedAt(): Carbon
    {
        return $this->createdAt;
    }
}
