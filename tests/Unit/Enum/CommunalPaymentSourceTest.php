<?php

namespace Wearesho\Bobra\Ubki\Tests\Unit\Enum;

use PHPUnit\Framework\TestCase;
use Wearesho\Bobra\Ubki\Enum\CommunalPaymentSource;

/**
 * Class CommunalPaymentSourceTest
 * @package Wearesho\Bobra\Ubki\Tests\Unit\Enum
 */
class CommunalPaymentSourceTest extends TestCase
{
    public function testEnums(): void
    {
        $this->assertEquals(CommunalPaymentSource::IRC(), new CommunalPaymentSource(CommunalPaymentSource::IRC));
        $this->assertEquals(CommunalPaymentSource::IRC(), new CommunalPaymentSource(CommunalPaymentSource::IRC));
    }
}
