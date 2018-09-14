<?php

namespace Wearesho\Bobra\Ubki\Validation\Rules;

use Carbon\Carbon;
use Wearesho\Bobra\Ubki\Infrastructure\Element;
use Wearesho\Bobra\Ubki\Validation\Rule;

/**
 * Class DateRule
 * @package Wearesho\Bobra\Ubki\Validation\Rules
 */
class DateRule extends Rule
{
    public function getMessage(): string
    {
        return 'Date have invalid format';
    }

    public function getPattern(): string
    {
        return '/^(19|20|21|22)\d\d-((0[1-9]|1[012])-(0[1-9]|[12]\\d)|(0[13-9]|1[012])-30|(0[13578]|1[02])-31)$/u';
    }

    public function execute(Element &$element): bool
    {
        foreach ($this->getAttributes() as $attribute) {
            /** @var \DateTimeInterface $date */
            $date = $element->{$attribute}();

            if (!$date instanceof \DateTimeInterface) {
                throw new \InvalidArgumentException("{$attribute} must be instance of " . \DateTimeInterface::class);
            }

            if (!preg_match($this->getPattern(), (string)Carbon::instance($date))) {
                return false;
            }
        }

        return true;
    }
}
