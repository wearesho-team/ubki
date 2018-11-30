<?php

namespace Wearesho\Bobra\Ubki\Tests\Unit\Dictionaries;

use PHPUnit\Framework\TestCase;
use Wearesho\Bobra\Ubki\Dictionaries\CommunalPaymentSource;

/**
 * Class CommunalPaymentSourceTest
 * @package Wearesho\Bobra\Ubki\Tests\Unit\Dictionaries
 * @coversDefaultClass \Wearesho\Bobra\Ubki\Dictionaries\CommunalPaymentSource
 * @internal
 */
class CommunalPaymentSourceTest extends TestCase
{
    public function testEnums(): void
    {
        $this->assertEquals(CommunalPaymentSource::IRC(), new CommunalPaymentSource(CommunalPaymentSource::IRC));
        $this->assertEquals(CommunalPaymentSource::IRC(), new CommunalPaymentSource(CommunalPaymentSource::IRC));
    }
}
