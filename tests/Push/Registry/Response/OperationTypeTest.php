<?php

namespace Wearesho\Bobra\Ubki\Tests\Push\Registry\Response;

use Wearesho\Bobra\Ubki\Push\Registry\Response\OperationType;
use PHPUnit\Framework\TestCase;

/**
 * Class OperationTypeTest
 * @internal
 * @package Wearesho\Bobra\Ubki\Tests\Push\Registry\Response
 */
class OperationTypeTest extends TestCase
{
    public function testInstanceByValue(): void
    {
        $this->expectException(\InvalidArgumentException::class);

        $this->assertEquals(OperationType::DELETING, OperationType::instanceByValue(OperationType::DELETING));
        $this->assertEquals(OperationType::TRANSFERRING, OperationType::instanceByValue(OperationType::TRANSFERRING));
        $this->assertEquals(OperationType::EDITING, OperationType::instanceByValue(OperationType::EDITING));
        OperationType::instanceByValue('INVALID');
    }

    public function testEditing(): void
    {
        $state = OperationType::EDITING();
        $this->assertEquals(OperationType::EDITING, $state->getValue());
        $this->assertEquals('EDITING', $state->getKey());
    }

    public function testTransferring(): void
    {
        $state = OperationType::TRANSFERRING();
        $this->assertEquals(OperationType::TRANSFERRING, $state->getValue());
        $this->assertEquals('TRANSFERRING', $state->getKey());
    }

    public function testDeleting(): void
    {
        $state = OperationType::DELETING();
        $this->assertEquals(OperationType::DELETING, $state->getValue());
        $this->assertEquals('DELETING', $state->getKey());
    }
}
