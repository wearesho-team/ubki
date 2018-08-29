<?php

namespace Wearesho\Bobra\Ubki\Tests\References;

use Wearesho\Bobra\Ubki\References\RequestInitiator;
use Wearesho\Bobra\Ubki\Tests\Extend\ReferenceTestCase;

/**
 * Class RequestInitiatorTest
 * @package Wearesho\Bobra\Ubki\Tests\References
 * @coversDefaultClass RequestInitiator
 * @internal
 */
class RequestInitiatorTest extends ReferenceTestCase
{
    public function testPartner(): void
    {
        $this->fakeReference = RequestInitiator::PARTNER(static::DESCRIPTION);
        $this->assertEquals(
            RequestInitiator::PARTNER(static::DESCRIPTION),
            $this->fakeReference
        );
    }

    public function testCourt(): void
    {
        $this->fakeReference = RequestInitiator::COURT(static::DESCRIPTION);
        $this->assertEquals(
            RequestInitiator::COURT(static::DESCRIPTION),
            $this->fakeReference
        );
    }

    public function testCertificatedSKI(): void
    {
        $this->fakeReference = RequestInitiator::CERTIFICATED_SKI(static::DESCRIPTION);
        $this->assertEquals(
            RequestInitiator::CERTIFICATED_SKI(static::DESCRIPTION),
            $this->fakeReference
        );
    }

    public function testSKI(): void
    {
        $this->fakeReference = RequestInitiator::SKI(static::DESCRIPTION);
        $this->assertEquals(
            RequestInitiator::SKI(static::DESCRIPTION),
            $this->fakeReference
        );
    }
}
