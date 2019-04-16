<?php

declare(strict_types=1);

namespace Wearesho\Bobra\Ubki\Data;

use Carbon\Carbon;
use Wearesho\Bobra\Ubki;

/**
 * Class Contact
 * @package Wearesho\Bobra\Ubki\Data
 *
 * @method static Contact make(...$arguments)
 */
class Contact implements Ubki\Contract\Data\Contact, \JsonSerializable
{
    use Makeable, Tagable;

    /** @var \DateTimeInterface */
    protected $createdAt;

    /** @var string */
    protected $value;

    /** @var Ubki\Dictionary\Contact */
    protected $type;

    /** @var string|null */
    protected $inn;

    public function __construct(
        \DateTimeInterface $createdAt,
        string $value,
        Ubki\Dictionary\Contact $type,
        string $inn = \null
    ) {
        Ubki\Validator::INN()->validate($inn, \true);

        $this->createdAt = $createdAt;
        $this->value = $value;
        $this->type = $type;
        $this->inn = $inn;
    }

    public function jsonSerialize(): array
    {
        return [
            'createdAt' => Carbon::make($this->createdAt),
            'value' => $this->value,
            'type' => $this->type,
            'inn' => $this->inn,
        ];
    }

    public static function tag(): string
    {
        return 'cont';
    }

    public function getCreatedAt(): \DateTimeInterface
    {
        return $this->createdAt;
    }

    public function getValue(): string
    {
        return $this->value;
    }

    public function getType(): Ubki\Dictionary\Contact
    {
        return $this->type;
    }

    public function getInn(): ?string
    {
        return $this->inn;
    }
}
