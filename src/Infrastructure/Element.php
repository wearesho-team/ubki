<?php

namespace Wearesho\Bobra\Ubki\Infrastructure;

use Wearesho\Bobra\Ubki\Validation\Rule;
use Wearesho\Bobra\Ubki\Validation\RuleCollection;
use Wearesho\Bobra\Ubki\Validation\ValidationException;

/**
 * Class Element
 * @package Wearesho\Bobra\Ubki\Infrastructure
 */
abstract class Element implements ElementInterface
{
    public function __construct()
    {
        $this->validate();
    }

    /**
     * Name of tag
     *
     * @return string
     */
    abstract public function tag(): string;

    /**
     * Validation rules for attributes
     *
     * @return RuleCollection
     */
    abstract public function rules(): RuleCollection;

    public function validate(): void
    {
        /** @var Rule $rule */
        foreach ($this->rules() as $rule) {
            if (!$rule->execute($this)) {
                throw new ValidationException($this->{$attribute}, $rule->getMessage());
            }
        }
    }
}
