<?php

namespace Wearesho\Bobra\Ubki\Tests\Blocks\Entities;

use Carbon\Carbon;

use PHPUnit\Framework\TestCase;

use Wearesho\Bobra\Ubki\Data\Elements\Photo;

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
                'createdAt' => static::CREATED_AT,
                'inn' => static::INN,
                'photo' => static::PHOTO
            ],
            $this->fakePhoto->jsonSerialize()
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
            $this->fakePhoto->getPhoto()
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
