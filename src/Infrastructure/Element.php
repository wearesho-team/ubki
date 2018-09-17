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
     * @param $name
     *
     * @return mixed
     */
    public function __get($name)
    {
        if (!array_key_exists($name, get_object_vars($this))) {
            throw new \InvalidArgumentException("Attribute [{$name}] does not exist in " . self::class);
        }

        return $this->{$name};
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
     * @return null|RuleCollection
     */
    public function rules(): ?RuleCollection
    {
        return null;
    }

    public function validate(): void
    {
        $rules = $this->rules();

        if (is_null($rules)) {
            return;
        }

        /** @var Rule $rule */
        foreach ($rules as $rule) {
            if (!$rule->execute($this)) {
                throw new ValidationException('Validation exception', $rule->getMessage());
            }
        }
    }
}
