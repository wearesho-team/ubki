<?php

namespace Wearesho\Bobra\Ubki\Tests\Block;

use Carbon\Carbon;

use Wearesho\Bobra\Ubki;

/**
 * Class PhotoTest
 * @internal
 * @package Wearesho\Bobra\Ubki\Tests\Block
 */
class PhotoTest extends Ubki\Tests\Extend\BlockTestCase
{
    /** @var Ubki\Block\Photo */
    protected $block;

    protected function setUp()/* The :void return type declaration that should be here would cause a BC issue */
    {
        Carbon::setTestNow(Carbon::now());

        $this->block = new Ubki\Block\Photo(
            Carbon::getTestNow(),
            base64_encode('some photo')
        );
    }

    public function testGetInn()
    {
        $this->assertNull($this->block->getInn());
    }

    public function test__construct()
    {
        $this->assertNotEmpty($this->block);
        $this->assertEquals(
            new Ubki\Block\Photo(
                Carbon::getTestNow(),
                base64_encode('some photo')
            ),
            $this->block
        );
    }

    public function testGetCreatedAt()
    {
        $this->assertEquals(Carbon::getTestNow(), $this->block->getCreatedAt());
    }

    public function testGetFoto()
    {
        $this->assertEquals(
            'some photo',
            base64_decode($this->block->getFoto())
        );
    }

    public function tag(): string
    {
        return 'foto';
    }
}
