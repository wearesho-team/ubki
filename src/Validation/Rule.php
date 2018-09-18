<?php

namespace Wearesho\Bobra\Ubki\Validation;

/**
 * Class Rule
 * @package Wearesho\Bobra\Ubki\Validation
 */
class Rule implements RuleInterface
{
    public const BASE_PATTERN = "/([\W\w])+/u";
    public const BASE_MESSAGE = "Validation exception";

    /** @var array */
    protected $attributes;

    /** @var callable|null */
    protected $userValidation;

    public function __construct(array $attributes, callable $userRule = null)
    {
        $this->attributes = $attributes;
        $this->userValidation = $userRule;
    }

    /**
     * The regular expression by which the value of the attribute is validated
     *
     * @return mixed
     */
    public function getPattern(): string
    {
        return static::BASE_PATTERN;
    }

    /**
     * A public message containing an explanation of the error
     *
     * @return string
     */
    public function getMessage(): string
    {
        return static::BASE_MESSAGE;
    }

    /**
     * Should return false if is not valid or true if is valid
     *
     * @param mixed $value
     */
    public function validate($value): void
    {
        $match = $this->userValidation
            ? call_user_func($this->getUserValidation(), $value)
            : $this->regex((string)$value);

        if (!($match ?? false)) {
            throw new ValidationException($value, $this->getMessage());
        }
    }

    /**
     * Properties of your class that should be validated
     *
     * @return array
     */
    public function getAttributes(): array
    {
        return $this->attributes;
    }

    public function getUserValidation(): ?callable
    {
        return $this->userValidation;
    }

    public function regex(string $value, array &$matches = null, $flags = 0, $offset = 0): bool
    {
        return preg_match($this->getPattern(), $value, $matches, $flags, $offset);
    }
}
