<?php

namespace Wearesho\Bobra\Ubki\Tests;

use PHPUnit\Framework;

class TestCase extends Framework\TestCase
{
    public function assertArraySubset(array $expected, array $actual): void
    {
        foreach ($expected as $key => $value) {
            $this->assertArrayHasKey($key, $actual);
            $this->assertEquals($value, $actual[$key]);
        }
    }
}
