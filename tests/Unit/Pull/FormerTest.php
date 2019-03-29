<?php

namespace Wearesho\Bobra\Ubki\Tests\Unit\Pull;

use PHPUnit\Framework\TestCase;
use Wearesho\Bobra\Ubki;

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
            new class implements Ubki\RequestInterface
            {
                use Ubki\ElementTrait;

                public function getBody()
                {
                    throw new \RuntimeException();
                }

                public function getHead(): Ubki\Data\RequestHead
                {
                    throw new \RuntimeException();
                }
            },
            'sessionId'
        );
    }
}
