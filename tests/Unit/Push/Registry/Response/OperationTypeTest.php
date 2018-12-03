<?php

namespace Wearesho\Bobra\Ubki\Tests\Unit\Push\Registry\Response;

use PHPUnit\Framework\TestCase;
use Wearesho\Bobra\Ubki\Push\Registry\Response\OperationType;

/**
 * Class OperationTypeTest
 * @package Wearesho\Bobra\Ubki\Tests\Unit\Push\Registry\Response
 * @coversDefaultClass \Wearesho\Bobra\Ubki\Push\Registry\Response\OperationType
 * @internal
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
