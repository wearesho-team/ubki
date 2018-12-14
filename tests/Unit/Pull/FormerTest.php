<?php

namespace Wearesho\Bobra\Ubki\Tests\Unit\Pull;

use PHPUnit\Framework\TestCase;
use Wearesho\Bobra\Ubki;
use Wearesho\Bobra\Ubki\Data\Interfaces\RequestData;

/**
 * Class FormerTest
 * @package Wearesho\Bobra\Ubki\Tests\Unit\Pull
 */
class FormerTest extends TestCase
{
    /** @var Ubki\Pull\FormerInterface */
    protected $fakeFormer;

    protected function setUp(): void
    {
        $this->fakeFormer = new Ubki\Pull\Former();
    }

    public function testException(): void
    {
        $this->expectException(Ubki\Exception\Former::class);

        $this->fakeFormer->form(
            new class implements Ubki\Infrastructure\RequestInterface
            {
                use Ubki\Infrastructure\ElementTrait;

                public function getBody()
                {
                    throw new \RuntimeException();
                }

                public function getHead(): RequestData
                {
                    throw new \RuntimeException();
                }
            },
            'sessionId'
        );
    }
}
