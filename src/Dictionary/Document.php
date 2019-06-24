<?php

declare(strict_types=1);

namespace Wearesho\Bobra\Ubki\Dictionary;

use Wearesho\Bobra\Ubki\Dictionary;

/**
 * Class Document
 * @package Wearesho\Bobra\Ubki\Dictionary
 *
 * @method static Document PASSPORT(string $description = \null)
 * @method static Document DRIVER(string $description = \null)
 * @method static Document INTERNATIONAL(string $description = \null)
 * @method static Document BIRTH(string $description = \null)
 * @method static Document SEAMAN(string $description = \null)
 * @method static Document MILITARY(string $description = \null)
 * @method static Document TEMP_CARD(string $description = \null)
 * @method static Document DIPLOMA(string $description = \null)
 * @method static Document ATTESTAT(string $description = \null)
 * @method static Document CITIZEN(string $description = \null)
 * @method static Document STATE_REGISTRATION(string $description = \null)
 * @method static Document EXTRACT_FROM_EGR(string $description = \null)
 * @method static Document ORDERING_FROM_EGR(string $description = \null)
 * @method static Document CERTIFICATE_TAXPAYERS(string $description = \null)
 * @method static Document INFORMATION_TAXPAYER(string $description = \null)
 * @method static Document RESIDENCE(string $description = \null)
 * @method static Document UKRAINE_CARD(string $description = \null)
 */
final class Document extends Dictionary
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
