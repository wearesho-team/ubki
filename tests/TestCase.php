<?php

namespace Wearesho\Bobra\Ubki\Tests;

use Wearesho\Bobra\Ubki;

/**
 * Class TestCase
 * @package Wearesho\Bobra\Ubki\Tests
 */
class TestCase extends \PHPUnit\Framework\TestCase
{
    /** @var Ubki\Tests\Fakers\DictionaryFaker */
    protected $dictionaryFaker;

    /** @var Ubki\Tests\Fakers\ElementFaker */
    protected $elementFaker;

    protected function setUp(): void
    {
        parent::setUp();

        $this->dictionaryFaker = new Ubki\Tests\Fakers\DictionaryFaker();
        $this->elementFaker = Ubki\Tests\Fakers\ElementFaker::instance();
    }
}
