<?php

namespace Wearesho\Bobra\Ubki\Validation;

use Wearesho\Bobra\Ubki\Infrastructure\Element;

/**
 * Class Rule
 * @package Wearesho\Bobra\Ubki\Validation
 */
abstract class Rule
{
    use RuleTrait;

    public const INN_LENGTH = 10;

    /** @var array|null */
    protected $attributes;

    /** @var Rule[] */
    protected static $cache;

    protected function __construct(array $attributes = null)
    {
        $this->attributes = $attributes;
    }

    /**
     * The regular expression by which the value of the attribute is validated
     *
     * @return mixed
     */
    abstract public function getPattern(): string;

    /**
     * A public message containing an explanation of the error
     *
     * @return string
     */
    abstract public function getMessage(): string;

    /**
     * @param array $attributes
     *
     * @return static
     */
    public static function verify(array $attributes): Rule
    {
        $cacheRules = static::$cache;

        foreach ((array)$cacheRules as $rule) {
            if ($rule instanceof self && $rule->getAttributes() == $attributes) {
                return $rule;
            }
        }

        $rule = new static($attributes);
        static::$cache[] = $rule;

        return $rule;
    }

    /**
     * Should return false if is not valid or true if is valid
     *
     * @param Element $element
     *
     * @return bool
     */
    public function execute(Element &$element): bool
    {
        foreach ($this->getAttributes() as $attribute) {
            $line = $element->$attribute;

            if (is_null($line)) {
                return true;
            }

            if (!$this->regex($line)) {
                return false;
            }
        }

        return true;
    }
}
