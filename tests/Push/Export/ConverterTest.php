<?php

namespace Wearesho\Bobra\Ubki\Tests\Push\Export;

use PHPUnit\Framework\TestCase;

use Wearesho\Bobra\Ubki\Blocks\Interfaces;
use Wearesho\Bobra\Ubki\Blocks\Entities;
use Wearesho\Bobra\Ubki\ElementInterface;
use Wearesho\Bobra\Ubki\Push\Export\Converter;

/**
 * class ConverterTest
 * @package Wearesho\Bobra\Ubki\Tests\Push\Export
 */
class ConverterTest extends TestCase
{
    /** @var Converter */
    protected $fakeConverter;

    protected function setUp(): void
    {
        $this->fakeConverter = new Converter();
    }
}
