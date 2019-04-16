<?php

namespace Wearesho\Bobra\Ubki\Pull\Report;

use Wearesho\Bobra\Ubki\Dictionary;

/**
 * Class Type
 * @package Wearesho\Bobra\Ubki\Pull\Report
 *
 * @method static Type SKI_CREDIT_HISTORY(string $description = \null)
 * @method static Type SKI_CREDIT_RATING_1(string $description = \null)
 * @method static Type SKI_CREDIT_RATING_ANDROID(string $description = \null)
 * @method static Type SKI_CREDIT_RATING_2(string $description = \null)
 *
 * @method static Type REPORT_AFS(string $description = \null)
 *
 * @method static Type EXPORT_CREDIT_REQUEST_DECISION(string $description = \null)
 *
 * @method static Type CONTACTS(string $description = \null)
 * @method static Type CREDIT_REPORT(string $description = \null)
 * @method static Type CREDIT_REPORT_WITH_PRIVATBANK(string $description = \null)
 * @method static Type CREDTI_RATE(string $description = \null)
 * @method static Type IDENTIFICATION(string $description = \null)
 * @method static Type CHECK_PASSPORT_MVD(string $description = \null)
 * @method static Type LEGAL_CREDIT_REPORT(string $description = \null)
 * @method static Type LEGAL_CREDIT_REPORT_WITH_PRIVATBANK(string $description = \null)
 * @method static Type AFS_UBKI(string $description = \null)
 * @method static Type PHOTO_VERIFICATION(string $description = \null)
 * @method static Type KI_REQUEST(string $description = \null)
 * @method static Type KI_AVAILABILITY(string $description = \null)
 * @method static Type MVD_IDENTIFICATION(string $description = \null)
 * @method static Type STATEMENTS_SEARCH(string $description = \null)
 * @method static Type AVAILABLE_TEMPLATES(string $description = \null)
 * @method static Type INDIVIDUAL_SCORING(string $description = \null)
 * @method static Type PUBLIC_DOSSIER(string $description = \null)
 * @method static Type COUNTERPARTY_STATUS(string $description = \null)
 * @method static Type TELECOM_REPORT(string $description = \null)
 */
final class Type extends Dictionary
{
    public const SKI_CREDIT_HISTORY = '01';
    public const SKI_CREDIT_RATING_1 = '02';
    public const SKI_CREDIT_RATING_ANDROID = '03';
    public const SKI_CREDIT_RATING_2 = '08';

    /**
     * @deprecated Decommissioned
     */
    public const REPORT_AFS = '06';

    /**
     * @internal Not available
     */
    public const EXPORT_CREDIT_REQUEST_DECISION = '23';

    public const CONTACTS = '04';
    public const CREDIT_REPORT = '09';
    public const CREDIT_REPORT_WITH_PRIVATBANK = '10';
    public const CREDIT_RATE = '11';
    public const IDENTIFICATION = '12';
    public const CHECK_PASSPORT_MVD = '13';
    public const LEGAL_CREDIT_REPORT = '14';
    public const LEGAL_CREDIT_REPORT_WITH_PRIVATBANK = '15';
    public const AFS_UBKI = '16';
    public const PHOTO_VERIFICATION = '17';
    public const KI_REQUEST = '19';
    public const KI_AVAILABILITY = '20';
    public const MVD_IDENTIFICATION = '21';
    public const STATEMENTS_SEARCH = '22';
    public const AVAILABLE_TEMPLATES = '24';
    public const INDIVIDUAL_SCORING = '25';
    public const PUBLIC_DOSSIER = '26';
    public const COUNTERPARTY_STATUS = '27';
    public const TELECOM_REPORT = '30';
}
