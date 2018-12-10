<?php

namespace Wearesho\Bobra\Ubki\Tests;

use Wearesho\Bobra\Ubki;

/**
 * Class TestCase
 * @package Wearesho\Bobra\Ubki\Tests
 */
class TestCase extends \PHPUnit\Framework\TestCase
{
    /** @var Ubki\Tests\Fakers\BaseFaker */
    protected $faker;

    protected function setUp(): void
    {
        parent::setUp();
        $this->faker = new Ubki\Tests\Fakers\BaseFaker();
        $this->faker->setFaker('collection', new Ubki\Tests\Fakers\ElementCollectionFaker());
        $this->faker->setFaker('dictionary', new Ubki\Tests\Fakers\DictionaryFaker());
        $this->faker->setFaker('element', new Ubki\Tests\Fakers\ElementFaker());
    }
}
