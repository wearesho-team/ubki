<?php

declare(strict_types=1);

namespace Wearesho\Bobra\Ubki\Data;

use Wearesho\Bobra\Ubki;

/**
 * Class Person
 * @package Wearesho\Bobra\Ubki\Data
 */
abstract class Person implements Ubki\Contract\Data\Person
{
    use Tagable;

    /** @var string */
    protected $name;

    public function getName(): string
    {
        return $this->name;
    }

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public static function tag(): string
    {
        return 'ident';
    }
}
