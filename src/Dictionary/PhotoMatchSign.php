<?php

declare(strict_types=1);

namespace Wearesho\Bobra\Ubki\Dictionary;

use Wearesho\Bobra\Ubki\Dictionary;

/**
 * Class PhotoMatchSign
 * @package Wearesho\Bobra\Ubki\Dictionary
 *
 * @method static PhotoMatchSign SERVICE_ERROR(string $description = \null)
 * @method static PhotoMatchSign REQUEST_WAS_NOT_MADE(string $description = \null)
 * @method static PhotoMatchSign SUCCESS(string $description = \null)
 * @method static PhotoMatchSign FAILURE(string $description = \null)
 * @method static PhotoMatchSign FACE_NOT_FOUND(string $description = \null)
 * @method static PhotoMatchSign PHOTOS_NOT_FOUND(string $description = \null)
 * @method static PhotoMatchSign CUSTOMER_NOT_FOUNT(string $description = \null)
 */
final class PhotoMatchSign extends Dictionary
{
    public const SERVICE_ERROR = -1;
    public const REQUEST_WAS_NOT_MADE = 0;
    public const SUCCESS = 1;
    public const FAILURE = 2;
    public const FACE_NOT_FOUND = 3;
    public const PHOTOS_NOT_FOUND = 4;
    public const CUSTOMER_NOT_FOUNT = 5;
}
