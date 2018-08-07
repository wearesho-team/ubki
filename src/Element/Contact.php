<?php

namespace Wearesho\Bobra\Ubki\Element;

use Wearesho\Bobra\Ubki;

/**
 * Data of one subject's contact
 *
 * Class Contact
 * @package Wearesho\Bobra\Ubki\Element
 *
 * @property-read \DateTimeInterface $createdAt
 * @property-read string $value
 * @property-read int $type,
 * @property-read string|null $inn
 */
class Contact extends Ubki\Element
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

    /** @var int */
    protected $type;

    /** @var string|null */
    protected $inn;

    public function __construct(
        \DateTimeInterface $createdAt,
        string $value,
        int $type,
        ?string $inn = null
    ) {
        parent::__construct([
            'createdAt' => $createdAt,
            'value' => $value,
            'type' => $type,
            'inn' => $inn
        ]);
    }
}
