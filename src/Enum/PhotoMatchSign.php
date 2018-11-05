<?php

namespace Wearesho\Bobra\Ubki\Enum;

use MyCLabs\Enum\Enum;

/**
 * Class PhotoMatchSign
 * @package Wearesho\Bobra\Ubki\Enum
 *
 * @method static PhotoMatchSign SERVICE_ERROR()
 * @method static PhotoMatchSign REQUEST_WAS_NOT_MADE()
 * @method static PhotoMatchSign SUCCESS()
 * @method static PhotoMatchSign FAILURE()
 * @method static PhotoMatchSign FACE_NOT_FOUND()
 * @method static PhotoMatchSign PHOTOS_NOT_FOUND()
 * @method static PhotoMatchSign CUSTOMER_NOT_FOUNT()
 */
final class PhotoMatchSign extends Enum
{
    public const SERVICE_ERROR = -1;
    public const REQUEST_WAS_NOT_MADE = 0;
    public const SUCCESS = 1;
    public const FAILURE = 2;
    public const FACE_NOT_FOUND = 3;
    public const PHOTOS_NOT_FOUND = 4;
    public const CUSTOMER_NOT_FOUNT = 5;
}
