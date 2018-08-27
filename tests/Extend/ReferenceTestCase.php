<?php

namespace Wearesho\Bobra\Ubki\Tests\Extend;

use PHPUnit\Framework\TestCase;

use Wearesho\Bobra\Ubki\Reference;

/**
 * Class ReferenceTestCase
 * @package Wearesho\Bobra\Ubki\Tests\Extend
 */
abstract class ReferenceTestCase extends TestCase
{
    protected const DESCRIPTION = 'description';

    /** @var Reference */
    protected $fakeReference;
}
