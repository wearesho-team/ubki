<?php

namespace Wearesho\Bobra\Ubki\Validation;

use Wearesho\Bobra\Ubki\Infrastructure\ElementInterface;

/**
 * Trait RuleTrait
 * @package Wearesho\Bobra\Ubki\Validation
 */
trait RuleTrait
{
    public function getAttributes(): array
    {
        return $this->attributes;
    }

    public function regex(string $value, array &$matches = null, $flags = 0, $offset = 0): bool
    {
        return preg_match($this->getPattern(), $value, $matches, $flags, $offset);
    }

    protected function fetchAttribute(ElementInterface &$element, string $attribute)
    {
        return $element->{$attribute}();
    }
}
