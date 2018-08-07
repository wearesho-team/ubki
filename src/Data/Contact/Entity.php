<?php

namespace Wearesho\Bobra\Ubki\Data\Contact;

use Carbon\Carbon;

use Wearesho\Bobra\Ubki\Element;

/**
 * Data of one subject's contact
 *
 * Class Entity
 * @package Wearesho\Bobra\Ubki\Data\Contact
 *
 * @property-read \DateTimeInterface $createdAt
 * @property-read string $value
 * @property-read Type $type
 * @property-read string|null inn
 */
class Entity extends Element implements \JsonSerializable
{
    public const TAG = 'cont';

    public const VALUE = 'cval';
    public const TYPE = 'ctype';
    public const CREATED_AT = 'vdate';
    public const INN = 'inn';

    /** @var \DateTimeInterface */
    protected $createdAt;

    /** @var string */
    protected $value;

    /** @var Type */
    protected $type;

    /** @var string|null */
    protected $inn;

    public function __construct(
        \DateTimeInterface $createdAt,
        string $value,
        Type $type,
        ?string $inn = null
    ) {
        $this->createdAt = $createdAt;
        $this->value = $value;
        $this->type = $type;
        $this->inn = $inn;
    }

    public function jsonSerialize(): array
    {
        return [
            'createdAt' => Carbon::instance($this->createdAt)->toDateString(),
            'value' => $this->value,
            'type' => (string)$this->type,
            'inn' => $this->inn
        ];
    }
}
