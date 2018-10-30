<?php

namespace Wearesho\Bobra\Ubki\Enum;

use MyCLabs\Enum\Enum;

/**
 * Class DocumentType
 * @package Wearesho\Bobra\Ubki\Enum
 *
 * @method static DocumentType PASSPORT()
 * @method static DocumentType DRIVER()
 * @method static DocumentType INTERNATIONAL()
 * @method static DocumentType BIRTH()
 * @method static DocumentType SEAMAN()
 * @method static DocumentType MILITARY()
 * @method static DocumentType TEMP_CARD()
 * @method static DocumentType DIPLOMA()
 * @method static DocumentType ATTESTAT()
 * @method static DocumentType CITIZEN()
 * @method static DocumentType STATE_REGISTRATION()
 * @method static DocumentType EXTRACT_FROM_EGR()
 * @method static DocumentType ORDERING_FROM_EGR()
 * @method static DocumentType CERTIFICATE_TAXPAYERS()
 * @method static DocumentType INFORMATION_TAXPAYER()
 * @method static DocumentType RESIDENCE()
 * @method static DocumentType UKRAINE_CARD()
 */
final class DocumentType extends Enum
{
    public const PASSPORT = 1;
    public const DRIVER = 2;
    public const INTERNATIONAL = 3;
    public const BIRTH = 4;
    public const SEAMAN = 5;
    public const MILITARY = 6;
    public const TEMP_CARD = 7;
    public const DIPLOMA = 8;
    public const ATTESTAT = 9;
    public const CITIZEN = 10;
    public const STATE_REGISTRATION = 11;
    public const EXTRACT_FROM_EGR = 12;
    public const ORDERING_FROM_EGR = 13;
    public const CERTIFICATE_TAXPAYERS = 14;
    public const INFORMATION_TAXPAYER = 15;
    public const RESIDENCE = 16;
    public const UKRAINE_CARD = 17;
}
