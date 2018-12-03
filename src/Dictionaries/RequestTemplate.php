<?php

namespace Wearesho\Bobra\Ubki\Dictionaries;

use Wearesho\Bobra\Ubki\Infrastructure\Dictionary;

/**
 * Class RequestTemplate
 * @package Wearesho\Bobra\Ubki\Dictionaries
 *
 * @method static RequestTemplate CONTACTS(string $description = null)
 * @method static RequestTemplate STANDARD(string $description = null)
 * @method static RequestTemplate PRIVAT(string $description = null)
 * @method static RequestTemplate RATING(string $description = null)
 * @method static RequestTemplate IDENTIFICATION(string $description = null)
 * @method static RequestTemplate MVD(string $description = null)
 * @method static RequestTemplate LEGAL(string $description = null)
 * @method static RequestTemplate LEGAL_PRIVAT(string $description = null)
 * @method static RequestTemplate AFS(string $description = null)
 * @method static RequestTemplate PHOTO_VERIFICATION(string $description = null)
 * @method static RequestTemplate BILLS(string $description = null)
 * @method static RequestTemplate INDIVIDUAL_SCORING(string $description = null)
 */
final class RequestTemplate extends Dictionary
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
