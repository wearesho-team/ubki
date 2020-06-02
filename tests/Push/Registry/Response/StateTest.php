<?php

namespace Wearesho\Bobra\Ubki\Tests\Push\Registry\Response;

use Wearesho\Bobra\Ubki\Push\Registry\Response\State;

use Wearesho\Bobra\Ubki\Tests\TestCase;

/**
 * Class StateTest
 * @internal
 * @package Wearesho\Bobra\Ubki\Tests\Push\Registry\Response
 */
class StateTest extends TestCase
{
    public function testProcessed(): void
    {
        $state = State::PROCESSED();
        $this->assertEquals(State::PROCESSED, $state->getValue());
        $this->assertEquals('PROCESSED', $state->getKey());
    }

    public function testCreated(): void
    {
        $state = State::CREATED();
        $this->assertEquals(State::CREATED, $state->getValue());
        $this->assertEquals('CREATED', $state->getKey());
    }

    public function testTransmitted(): void
    {
        $state = State::TRANSMITTED();
        $this->assertEquals(State::TRANSMITTED, $state->getValue());
        $this->assertEquals('TRANSMITTED', $state->getKey());
    }

    public function testSqlError(): void
    {
        $state = State::SQL_ERROR();
        $this->assertEquals(State::SQL_ERROR, $state->getValue());
        $this->assertEquals('SQL_ERROR', $state->getKey());
    }

    public function testBlocked(): void
    {
        $state = State::BLOCKED();
        $this->assertEquals(State::BLOCKED, $state->getValue());
        $this->assertEquals('BLOCKED', $state->getKey());
    }
}
