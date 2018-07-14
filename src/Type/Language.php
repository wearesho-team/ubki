<?php

namespace Wearesho\Bobra\Ubki\Type;

use MyCLabs\Enum\Enum;

/**
 * Class Language
 * @package Wearesho\Bobra\Ubki\Data
 *
// * @method static Language RU()
 * @method static Language UA()
 * @method static Language EN()
 */
final class Language extends Enum
{
    public const RU = 1;
    public const UA = 2;
    public const EN = 4;

    protected $description;

    public function __construct(int $value, ?string $description = null)
    {
        $this->description = $description;

        parent::__construct($value);
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function RU(?string $description = null): Language
    {
        return new Language(Language::RU, $description);
    }
}
