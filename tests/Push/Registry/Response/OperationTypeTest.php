<?php

namespace Wearesho\Bobra\Ubki\Tests\Push\Registry\Response;

use Wearesho\Bobra\Ubki\Push\Registry\Response\OperationType;
use Wearesho\Bobra\Ubki\Tests\TestCase;

/**
 * Class OperationTypeTest
 * @internal
 * @package Wearesho\Bobra\Ubki\Tests\Push\Registry\Response
 */
class OperationTypeTest extends TestCase
{
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
