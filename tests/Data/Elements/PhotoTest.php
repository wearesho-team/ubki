<?php

namespace Wearesho\Bobra\Ubki\Tests\Data\Elements;

use Carbon\Carbon;

use Wearesho\Bobra\Ubki\Tests\TestCase;

use Wearesho\Bobra\Ubki\Data\Elements\Photo;
use Wearesho\Bobra\Ubki\Data\Interfaces;

/**
 * Class PhotoTest
 * @package Wearesho\Bobra\Ubki\Tests\Data\Elements
 * @coversDefaultClass Photo
 * @internal
 */
class PhotoTest extends TestCase
{
    protected const CREATED_AT = '2018-03-12';
    protected const PHOTO = 'testPhoto';
    protected const INN = 'testInn';

    /** @var Photo */
    protected $fakePhoto;

    protected function setUp(): void
    {
        $this->fakePhoto = new Photo(
            Carbon::parse(static::CREATED_AT),
            static::PHOTO,
            static::INN
        );
    }

    public function testJsonSerialize(): void
    {
        $this->assertArraySubset(
            [
                Interfaces\Photo::CREATED_AT => static::CREATED_AT,
                Interfaces\Photo::INN => static::INN,
                Interfaces\Photo::PHOTO => static::PHOTO
            ],
            $this->fakePhoto->jsonSerialize()
        );
    }

    public function testTag(): void
    {
        $this->assertEquals(
            Interfaces\Photo::TAG,
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
