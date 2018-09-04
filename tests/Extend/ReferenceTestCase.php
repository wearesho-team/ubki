<?php

namespace Wearesho\Bobra\Ubki\Tests\Extend;

use PHPUnit\Framework\TestCase;

use Wearesho\Bobra\Ubki\Dictionary;

/**
 * Class ReferenceTestCase
 * @package Wearesho\Bobra\Ubki\Tests\Extend
 */
abstract class ReferenceTestCase extends TestCase
{
    protected const DESCRIPTION = 'testDescription';

    /** @var Dictionary */
    protected $fakeReference;
}
