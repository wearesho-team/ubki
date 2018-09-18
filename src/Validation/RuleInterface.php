<?php

namespace Wearesho\Bobra\Ubki\Validation;

/**
 * Interface RuleInterface
 * @package Wearesho\Bobra\Ubki\Validation
 */
interface RuleInterface
{
    public function getPattern(): string;

    public function getMessage(): string;

    public function getAttributes(): array;

    public function validate($value): void;
}
