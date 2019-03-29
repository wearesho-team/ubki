<?php

namespace Wearesho\Bobra\Ubki\Dictionary;

use Wearesho\Bobra\Ubki\Dictionary;

/**
 * Class DismissalReason
 * @package Wearesho\Bobra\Ubki\Dictionary
 *
 * @see Administrative Codex of Ukraine
 *
 * @method static DismissalReason ARTICLE_28(string $description = null)
 * @method static DismissalReason ARTICLE_36_PARAGRAPH_1(string $description = null)
 * @method static DismissalReason ARTICLE_36_PARAGRAPH_2(string $description = null)
 * @method static DismissalReason ARTICLE_36_PARAGRAPH_3(string $description = null)
 * @method static DismissalReason ARTICLE_36_PARAGRAPH_6_TYPE_1(string $description = null)
 * @method static DismissalReason ARTICLE_36_PARAGRAPH_6_TYPE_2(string $description = null)
 * @method static DismissalReason ARTICLE_36_PARAGRAPH_6_TYPE_3(string $description = null)
 * @method static DismissalReason ARTICLE_36_PARAGRAPH_7(string $description = null)
 * @method static DismissalReason ARTICLE_36_PARAGRAPH_8(string $description = null)
 * @method static DismissalReason ARTICLE_38_TYPE_1(string $description = null)
 * @method static DismissalReason ARTICLE_38_TYPE_2(string $description = null)
 * @method static DismissalReason ARTICLE_38_TYPE_3(string $description = null)
 * @method static DismissalReason ARTICLE_38_TYPE_4(string $description = null)
 * @method static DismissalReason ARTICLE_38_TYPE_5(string $description = null)
 * @method static DismissalReason ARTICLE_38_TYPE_6(string $description = null)
 * @method static DismissalReason ARTICLE_38_TYPE_7(string $description = null)
 * @method static DismissalReason ARTICLE_38_TYPE_8(string $description = null)
 * @method static DismissalReason ARTICLE_38_TYPE_9(string $description = null)
 * @method static DismissalReason ARTICLE_39(string $description = null)
 * @method static DismissalReason ARTICLE_40_PARAGRAPH_1_TYPE_1(string $description = null)
 * @method static DismissalReason ARTICLE_40_PARAGRAPH_1_TYPE_2(string $description = null)
 * @method static DismissalReason ARTICLE_40_PARAGRAPH_1_TYPE_3(string $description = null)
 * @method static DismissalReason ARTICLE_40_PARAGRAPH_1_TYPE_4(string $description = null)
 * @method static DismissalReason ARTICLE_40_PARAGRAPH_1_TYPE_5(string $description = null)
 * @method static DismissalReason ARTICLE_40_PARAGRAPH_2_TYPE_1(string $description = null)
 * @method static DismissalReason ARTICLE_40_PARAGRAPH_2_TYPE_2(string $description = null)
 * @method static DismissalReason ARTICLE_40_PARAGRAPH_2_TYPE_3(string $description = null)
 * @method static DismissalReason ARTICLE_40_PARAGRAPH_3(string $description = null)
 * @method static DismissalReason ARTICLE_40_PARAGRAPH_4(string $description = null)
 * @method static DismissalReason ARTICLE_40_PARAGRAPH_5(string $description = null)
 * @method static DismissalReason ARTICLE_40_PARAGRAPH_6(string $description = null)
 * @method static DismissalReason ARTICLE_40_PARAGRAPH_7(string $description = null)
 * @method static DismissalReason ARTICLE_40_PARAGRAPH_8(string $description = null)
 * @method static DismissalReason ARTICLE_41_PARAGRAPH_1(string $description = null)
 * @method static DismissalReason ARTICLE_41_PARAGRAPH_2(string $description = null)
 * @method static DismissalReason ARTICLE_41_PARAGRAPH_3(string $description = null)
 * @method static DismissalReason ARTICLE_43_PARAGRAPH_1(string $description = null)
 * @method static DismissalReason DEATH(string $description = null)
 */
final class DismissalReason extends Dictionary
{
    /** @var int As a non-probationary */
    public const ARTICLE_28 = 1;
    
    /** @var int By agreement of the parties */
    public const ARTICLE_36_PARAGRAPH_1 = 2;

    /** @var int Expiry of the employment contract */
    public const ARTICLE_36_PARAGRAPH_2 = 3;

    /** @var int Due to the call to the Armed Forces */
    public const ARTICLE_36_PARAGRAPH_3 = 4;

    /** @var int Refusal to continue work due to changes in material working conditions */
    public const ARTICLE_36_PARAGRAPH_6_TYPE_1 = 5;

    /**
     * @var int
     * In specification is same as ARTICLE_36_PARAGRAPH_6_TYPE_1
     * @see DismissalReason::ARTICLE_36_PARAGRAPH_6_TYPE_1
     */
    public const ARTICLE_36_PARAGRAPH_6_TYPE_2 = 6;

    /** @var int Refusal to continue work due to with the change in the location of the enterprise */
    public const ARTICLE_36_PARAGRAPH_6_TYPE_3 = 7;

    /** @var int The entry into force of a court verdict */
    public const ARTICLE_36_PARAGRAPH_7 = 8;

    /** @var int In accordance with the contract */
    public const ARTICLE_36_PARAGRAPH_8 = 9;

    /** @var int At his own request */
    public const ARTICLE_38_TYPE_1 = 10;

    /** @var int At his own request (hiring for a competition) */
    public const ARTICLE_38_TYPE_2 = 11;

    /** @var int At his own request (care of a child under 14 years of age) */
    public const ARTICLE_38_TYPE_3 = 12;

    /** @var int At his own request (Due to the change of residence) */
    public const ARTICLE_38_TYPE_4 = 13;

    /** @var int At his own request (admission to an educational institution) */
    public const ARTICLE_38_TYPE_5 = 14;

    /** @var int At his own request (impossibility of residing in this area confirmed by medical conclusion) */
    public const ARTICLE_38_TYPE_6 = 15;

    /** @var int At his own request (pregnancy) */
    public const ARTICLE_38_TYPE_7 = 16;

    /** @var int At his own request (care for a sick family member or a disabled person of the 1st group) */
    public const ARTICLE_38_TYPE_8 = 17;

    /** @var int At his own request (Due to retirement) */
    public const ARTICLE_38_TYPE_9 = 18;

    /** @var int At the initiative of the employee due to illness or disability */
    public const ARTICLE_39 = 19;

    /** @var int Due to the change in the organization of production (liquidation of the enterprise) */
    public const ARTICLE_40_PARAGRAPH_1_TYPE_1 = 20;

    /** @var int Due to the change in the organization of production (reorganization of the enterprise) */
    public const ARTICLE_40_PARAGRAPH_1_TYPE_2 = 21;

    /** @var int Due to the change in the organization of production (bankruptcy of the enterprise) */
    public const ARTICLE_40_PARAGRAPH_1_TYPE_3 = 22;

    /** @var int Due to the change in the organization of production (re-profiling) */
    public const ARTICLE_40_PARAGRAPH_1_TYPE_4 = 23;

    /** @var int Due to decrease in the number or staff */
    public const ARTICLE_40_PARAGRAPH_1_TYPE_5 = 24;

    /** @var int Non-compliance of an employee with a position (due to lack of qualification) */
    public const ARTICLE_40_PARAGRAPH_2_TYPE_1 = 25;

    /** @var int Discrepancy of the employee of the post (for health reasons) */
    public const ARTICLE_40_PARAGRAPH_2_TYPE_2 = 26;

    /**
     * @var int
     * Not the correspondence of the employee of the post (due to the cancellation of access to state secrets)
     */
    public const ARTICLE_40_PARAGRAPH_2_TYPE_3 = 27;

    /** @var int For the systematic failure to fulfill their duties */
    public const ARTICLE_40_PARAGRAPH_3 = 28;

    /** @var int Absenteeism */
    public const ARTICLE_40_PARAGRAPH_4 = 29;

    /** @var int Absence at work more than 4 months in connection with temporary incapacity for work */
    public const ARTICLE_40_PARAGRAPH_5 = 30;

    /** @var int Restoration of an employee who previously performed this work */
    public const ARTICLE_40_PARAGRAPH_6 = 31;

    /** @var int Appearance at work in a state of intoxication */
    public const ARTICLE_40_PARAGRAPH_7 = 32;

    /** @var int Theft on the job site */
    public const ARTICLE_40_PARAGRAPH_8 = 33;

    /** @var int One-time gross violation of labor obligations */
    public const ARTICLE_41_PARAGRAPH_1 = 34;

    /** @var int Due to the loss of trust */
    public const ARTICLE_41_PARAGRAPH_2 = 35;

    /** @var int Immoral act */
    public const ARTICLE_41_PARAGRAPH_3 = 36;

    /** @var int Hiring a staff member instead of a part-time employee */
    public const ARTICLE_43_PARAGRAPH_1 = 37;

    /** @var int Due to death */
    public const DEATH = 38;
}
