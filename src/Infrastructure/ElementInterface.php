<?php

namespace Wearesho\Bobra\Ubki\Infrastructure;

use Wearesho\Bobra\Ubki\Validation\RuleCollection;

/**
 * Interface ElementInterface
 * @package Wearesho\Bobra\Ubki\Infrastructure
 */
interface ElementInterface extends \JsonSerializable
{
    public function tag(): string;

    public function validate(): void;

    public function rules(): ?RuleCollection;
}
