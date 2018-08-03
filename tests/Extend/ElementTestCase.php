<?php

namespace Wearesho\Bobra\Ubki\Tests\Extend;

use Wearesho\Bobra\Ubki\Element;

/**
 * Class ElementTestCase
 * @package Wearesho\Bobra\Ubki\Tests\Extend
 */
abstract class ElementTestCase extends \PHPUnit\Framework\TestCase
{
    protected const TAG = null;

    /** @var Element */
    protected $block;

    public function testTag(): void
    {
        $this->assertEquals(static::TAG, $this->block ? $this->block->tag() : null);
    }

    /**
     * @param array $expectedJson
     *
     * @throws \Exception
     */
    public function assertJsonSerialize(array $expectedJson): void
    {
        if (!$this->block instanceof \JsonSerializable) {
            throw new \Exception('Element must implement jsonserialize interface');
        }

        $this->assertEquals(
            $expectedJson,
            $this->block->jsonSerialize()
        );
    }
}
