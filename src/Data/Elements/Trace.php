<?php

namespace Wearesho\Bobra\Ubki\Data\Elements;

use Wearesho\Bobra\Ubki\Data\Collections\Steps;
use Wearesho\Bobra\Ubki\Infrastructure\Element;
use Wearesho\Bobra\Ubki\ElementTrait;

/**
 * Class Trace
 * @package Wearesho\Bobra\Ubki\Data\Elements
 */
class Trace implements Element
{
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

    public function getSteps(): Steps
    {
        return $this->steps;
    }
}
