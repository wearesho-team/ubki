<?php

namespace Wearesho\Bobra\Ubki\Data\Elements;

use Wearesho\Bobra\Ubki\Data\Collections\Steps;
use Wearesho\Bobra\Ubki\Infrastructure;

/**
 * Class Trace
 * @package Wearesho\Bobra\Ubki\Data\Elements
 */
class Trace extends Infrastructure\Element
{
    public const TAG = 'trace';

    /** @var Steps */
    protected $steps;

    public function __construct(Steps $steps)
    {
        $this->steps = $steps;
    }

    public function jsonSerialize(): array
    {
        return [
            'steps' => array_map(function (Step $step) {
                return $step->jsonSerialize();
            }, $this->steps->jsonSerialize()),
        ];
    }

    public function tag(): string
    {
        return static::TAG;
    }

    public function getSteps(): Steps
    {
        return $this->steps;
    }
}
