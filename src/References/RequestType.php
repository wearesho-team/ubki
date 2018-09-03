<?php

namespace Wearesho\Bobra\Ubki\References;

use Wearesho\Bobra\Ubki\Reference;

/**
 * Class RequestType
 * @package Wearesho\Bobra\Ubki\References
 */
final class RequestType extends Reference
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
