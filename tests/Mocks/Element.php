<?php

namespace Wearesho\Bobra\Ubki\Tests\Mocks;

use Wearesho\Bobra\Ubki;

/**
 * Class Element
 * @package Wearesho\Bobra\Ubki\Tests\Mocks
 *
 * @property-read int $value
 */
class Element extends Ubki\Element
{
    public const TAG = 'mock';

    public function __construct(int $value)
    {
        parent::__construct([
            'value' => $value
        ]);
    }
}
