<?php

namespace Wearesho\Bobra\Ubki\Enum;

use MyCLabs\Enum\Enum;

/**
 * Class RequestTemplate
 * @package Wearesho\Bobra\Ubki\Enum
 *
 * @method static RequestTemplate CONTACTS()
 * @method static RequestTemplate STANDARD()
 * @method static RequestTemplate PRIVAT()
 * @method static RequestTemplate RATING()
 * @method static RequestTemplate IDENTIFICATION()
 * @method static RequestTemplate MVD()
 * @method static RequestTemplate LEGAL()
 * @method static RequestTemplate LEGAL_PRIVAT()
 * @method static RequestTemplate AFS()
 * @method static RequestTemplate PHOTO_VERIFICATION()
 * @method static RequestTemplate BILLS()
 * @method static RequestTemplate INDIVIDUAL_SCORING()
 */
final class RequestTemplate extends Enum
{
    public const CONTACTS = '04';
    public const STANDARD = '09';
    public const PRIVAT = '10';
    public const RATING = '11';
    public const IDENTIFICATION = '12';
    public const MVD = '13';
    public const LEGAL = '14';
    public const LEGAL_PRIVAT = '15';
    public const AFS = '16';
    public const PHOTO_VERIFICATION = '17';
    public const BILLS = '22';
    public const INDIVIDUAL_SCORING = '25';
}
