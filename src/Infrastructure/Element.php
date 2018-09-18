<?php

namespace Wearesho\Bobra\Ubki\Infrastructure;

use Wearesho\Bobra\Ubki\Validation\RuleCollection;
use Wearesho\Bobra\Ubki\Validation\RuleInterface;

/**
 * Class Element
 * @package Wearesho\Bobra\Ubki\Infrastructure
 */
abstract class Element implements ElementInterface
{
    public function __construct()
    {
        foreach ((array)$this->rules() as $rule) {
            $this->validate($rule);
        }
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

    public function validate(RuleInterface $rule): void
    {
        /** @var string $attribute */
        foreach ($rule->getAttributes() as $attribute) {
            $rule->validate($this->$attribute);
        }
    }
}
