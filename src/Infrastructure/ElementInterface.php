<?php

namespace Wearesho\Bobra\Ubki\Infrastructure;

use Wearesho\Bobra\Ubki\Validation\RuleCollection;
use Wearesho\Bobra\Ubki\Validation\RuleInterface;

/**
 * Interface ElementInterface
 * @package Wearesho\Bobra\Ubki\Infrastructure
 */
interface ElementInterface extends \JsonSerializable
{
    public function tag(): string;

    public function validate(RuleInterface $rule): void;

    public function rules(): ?RuleCollection;
}
