<?php

namespace Wearesho\Bobra\Ubki\Tests\Unit\Enum;

use PHPUnit\Framework\TestCase;
use Wearesho\Bobra\Ubki\Enum\PhotoMatchSign;

/**
 * Class PhotoMatchSignTest
 * @package Wearesho\Bobra\Ubki\Tests\Unit\Enum
 * @coversDefaultClass PhotoMatchSign
 * @internal
 */
class PhotoMatchSignTest extends TestCase
{
    public function testEnums(): void
    {
        $this->assertEquals(
            PhotoMatchSign::CUSTOMER_NOT_FOUNT(),
            new PhotoMatchSign(PhotoMatchSign::CUSTOMER_NOT_FOUNT)
        );
        $this->assertEquals(PhotoMatchSign::FACE_NOT_FOUND(), new PhotoMatchSign(PhotoMatchSign::FACE_NOT_FOUND));
        $this->assertEquals(PhotoMatchSign::FAILURE(), new PhotoMatchSign(PhotoMatchSign::FAILURE));
        $this->assertEquals(PhotoMatchSign::PHOTOS_NOT_FOUND(), new PhotoMatchSign(PhotoMatchSign::PHOTOS_NOT_FOUND));
        $this->assertEquals(
            PhotoMatchSign::REQUEST_WAS_NOT_MADE(),
            new PhotoMatchSign(PhotoMatchSign::REQUEST_WAS_NOT_MADE)
        );
        $this->assertEquals(PhotoMatchSign::SERVICE_ERROR(), new PhotoMatchSign(PhotoMatchSign::SERVICE_ERROR));
        $this->assertEquals(PhotoMatchSign::SUCCESS(), new PhotoMatchSign(PhotoMatchSign::SUCCESS));
    }
}
