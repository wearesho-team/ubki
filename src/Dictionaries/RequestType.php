<?php

namespace Wearesho\Bobra\Ubki\Dictionaries;

use Wearesho\Bobra\Ubki\Infrastructure;

/**
 * Class RequestType
 * @package Wearesho\Bobra\Ubki\Dictionaries
 *
 * @method static static EXPORT(string $description = null)
 * @method static static EDIT(string $description = null)
 * @method static static DELETE(string $description = null)
 * @method static static CONTACTS(string $description = null)
 * @method static static REPORT_AFS(string $description = null)
 * @method static static ONLY_CREDIT_RATING(string $description = null)
 * @method static static CREDIT_REPORT(string $description = null)
 * @method static static CREDIT_REPORT_WITH_PRIVATBANK(string $description = null)
 * @method static static CREDTI_BALL(string $description = null)
 * @method static static IDENTIFICATION(string $description = null)
 * @method static static CHECK_PASSPORT_MVD(string $description = null)
 * @method static static LEGAL_CREDIT_REPORT(string $description = null)
 * @method static static LEGAL_CREDIT_REPORT_WITH_PRIVATBANK(string $description = null)
 * @method static static AFS_UBKI(string $description = null)
 * @method static static PHOTO_VERIFICATION(string $description = null)
 * @method static static KI_REQUEST(string $description = null)
 * @method static static MVD_IDENTIFICATION(string $description = null)
 * @method static static STATEMENTS_SEARCH(string $description = null)
 * @method static static EXPORT_CREDIT_REQUEST_DECISION(string $description = null)
 *
 * @deprecated
 * @see RequestTemplate
 */
final class RequestType extends Infrastructure\Dictionary
{
    // region export
    public const EXPORT = 'i';
    public const EDIT = 'u';
    public const DELETE = 'd';
    // endregion

    // region import
    public const CONTACTS = '04';
    public const REPORT_AFS = '06';
    public const ONLY_CREDIT_RATING = '08';
    public const CREDIT_REPORT = '09';
    public const CREDIT_REPORT_WITH_PRIVATBANK = '10';
    public const CREDTI_BALL = '11';
    public const IDENTIFICATION = '12';
    public const CHECK_PASSPORT_MVD = '13';
    public const LEGAL_CREDIT_REPORT = '14';
    public const LEGAL_CREDIT_REPORT_WITH_PRIVATBANK = '15';
    public const AFS_UBKI = '16';
    public const PHOTO_VERIFICATION = '17';
    public const KI_REQUEST = '19';
    public const MVD_IDENTIFICATION = '21';
    public const STATEMENTS_SEARCH = '22';
    public const EXPORT_CREDIT_REQUEST_DECISION = '23';
    // endregion
}
