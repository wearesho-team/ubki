<?php

namespace Wearesho\Bobra\Ubki\Rerefences;

use Wearesho\Bobra\Ubki\Reference;

/**
 * Class DocumentType
 * @package Wearesho\Bobra\Ubki\Rerefences
 *
 * @method static static PASSPORT(string $description = null)
 * @method static static DRIVER(string $description = null)
 * @method static static INTERNATIONAL(string $description = null)
 * @method static static BIRTH(string $description = null)
 * @method static static SEAMAN(string $description = null)
 * @method static static MILITARY(string $description = null)
 * @method static static TEMP_CARD(string $description = null)
 * @method static static DIPLOMA(string $description = null)
 * @method static static ATTESTAT(string $description = null)
 * @method static static CITIZEN(string $description = null)
 * @method static static STATE_REGISTRATION(string $description = null)
 * @method static static EXTRACT_FROM_EGR(string $description = null)
 * @method static static ORDERING_FROM_EGR(string $description = null)
 * @method static static CERTIFICATE_TAXPAYERS(string $description = null)
 * @method static static INFORMATION_TAXPAYER(string $description = null)
 * @method static static RESIDENCE(string $description = null)
 * @method static static UKRAINE_CARD(string $description = null)
 */
final class DocumentType extends Reference
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
