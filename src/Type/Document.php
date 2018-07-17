<?php

namespace Wearesho\Bobra\Ubki\Type;

use Wearesho\Bobra\Ubki;

/**
 * Class Document
 * @package Wearesho\Bobra\Ubki\Type
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
final class Document extends Ubki\Reference
{
    const PASSPORT = 1;
    const DRIVER = 2;
    const INTERNATIONAL = 3;
    const BIRTH = 4;
    const SEAMAN = 5;
    const MILITARY = 6;
    const TEMP_CARD = 7;
    const DIPLOMA = 8;
    const ATTESTAT = 9;
    const CITIZEN = 10;
    const STATE_REGISTRATION = 11;
    const EXTRACT_FROM_EGR = 12;
    const ORDERING_FROM_EGR = 13;
    const CERTIFICATE_TAXPAYERS = 14;
    const INFORMATION_TAXPAYER = 15;
    const RESIDENCE = 16;
    const UKRAINE_CARD = 17;
}
