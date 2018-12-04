<?php

namespace Wearesho\Bobra\Ubki\Tests\Unit\Data\Elements;

use Carbon\Carbon;
use PHPUnit\Framework\TestCase;
use Wearesho\Bobra\Ubki\Data;

/**
 * Class PhotoTest
 * @package Wearesho\Bobra\Ubki\Tests\Unit\Data\Elements
 * @coversDefaultClass \Wearesho\Bobra\Ubki\Data\Elements\Photo
 * @internal
 */
class PhotoTest extends TestCase
{
    protected const CREATED_AT = '2018-03-12';
    protected const PHOTO = 'testPhoto';
    protected const INN = 'testInn';

    /** @var Data\Elements\Photo */
    protected $fakePhoto;

    protected function setUp(): void
    {
        $this->fakePhoto = new Data\Elements\Photo(
            Carbon::parse(static::CREATED_AT),
            static::PHOTO,
            static::INN
        );
    }

    public function testJsonSerialize(): void
    {
        $this->assertArraySubset(
            [
                Data\Interfaces\Photo::CREATED_AT => Carbon::parse(static::CREATED_AT),
                Data\Interfaces\Photo::INN => static::INN,
                Data\Interfaces\Photo::PHOTO => static::PHOTO
            ],
            $this->fakePhoto->jsonSerialize()
        );
    }

    public function testTag(): void
    {
        $this->assertEquals(
            Data\Interfaces\Photo::TAG,
            $this->fakePhoto->tag()
        );
    }

    public function testGetCreatedAt(): void
    {
        $this->assertEquals(
            static::CREATED_AT,
            Carbon::instance($this->fakePhoto->getCreatedAt())->toDateString()
        );
    }

    public function testGetPhoto(): void
    {
        $this->assertEquals(
            static::PHOTO,
            $this->fakePhoto->getUri()
        );
    }

    public function testGetInn(): void
    {
        $this->assertEquals(
            static::INN,
            $this->fakePhoto->getInn()
        );
    }
}
