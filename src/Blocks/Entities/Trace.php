<?php

namespace Wearesho\Bobra\Ubki\Blocks\Entities;

use Wearesho\Bobra\Ubki\Blocks\Collections\Steps;
use Wearesho\Bobra\Ubki\ElementInterface;
use Wearesho\Bobra\Ubki\ElementTrait;

/**
 * Class Trace
 * @package Wearesho\Bobra\Ubki\Blocks\Entities
 */
class Trace implements ElementInterface
{
    use ElementTrait;

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

    public function getSteps(): Steps
    {
        return $this->steps;
    }
}
