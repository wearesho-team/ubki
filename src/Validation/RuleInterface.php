<?php

namespace Wearesho\Bobra\Ubki\Validation;

use Wearesho\Bobra\Ubki\Infrastructure\ElementInterface;

/**
 * Interface RuleInterface
 * @package Wearesho\Bobra\Ubki\Validation
 */
interface RuleInterface
{
    public function getPattern(): string;

    public function getMessage(): string;

    public function execute(ElementInterface &$element): bool;

    public function getAttributes(): array;
}
