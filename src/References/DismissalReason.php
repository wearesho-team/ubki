<?php

namespace Wearesho\Bobra\Ubki\References;

use Wearesho\Bobra\Ubki\Reference;

/**
 * Class DismissalReason
 * @package Wearesho\Bobra\Ubki\References
 *
 * @see     Administrative Codex of Ukraine
 * @see     https://docs.google.com/document/d/12yD1_bopAlZVAe-jFCKtGkOd15VJC4mPag_wH3gvChg/edit#heading=h.anodsrb0ocjs
 *
 * descriptions:
 * A - article of Administrative Codex of Ukraine
 * P - paragraph of article of Administrative Code of Ukraine
 * T - type of reason of concrete article or paragraph
 * n - number
 *
 * formats:
 * A_n
 * A_n_T_n
 * A_n_P_n
 * A_n_P_n_T_n
 *
 * @example $reason = DismissalReason::A_40_P_1_T_1();
 * @example $reason = new DismissalReason(DismissalReason::A_40_P_1_T_1);
 *
 * @method static static A_28(string $description = null)
 * @method static static A_36_P_1(string $description = null)
 * @method static static A_36_P_2(string $description = null)
 * @method static static A_36_P_3(string $description = null)
 * @method static static A_36_P_6_T_1(string $description = null)
 * @method static static A_36_P_6_T_2(string $description = null)
 * @method static static A_36_P_6_T_3(string $description = null)
 * @method static static A_36_P_7(string $description = null)
 * @method static static A_36_P_8(string $description = null)
 * @method static static A_38_T_1(string $description = null)
 * @method static static A_38_T_2(string $description = null)
 * @method static static A_38_T_3(string $description = null)
 * @method static static A_38_T_4(string $description = null)
 * @method static static A_38_T_5(string $description = null)
 * @method static static A_38_T_6(string $description = null)
 * @method static static A_38_T_7(string $description = null)
 * @method static static A_38_T_8(string $description = null)
 * @method static static A_38_T_9(string $description = null)
 * @method static static A_39(string $description = null)
 * @method static static A_40_P_1_T_1(string $description = null)
 * @method static static A_40_P_1_T_2(string $description = null)
 * @method static static A_40_P_1_T_3(string $description = null)
 * @method static static A_40_P_1_T_4(string $description = null)
 * @method static static A_40_P_1_T_5(string $description = null)
 * @method static static A_40_P_2_T_1(string $description = null)
 * @method static static A_40_P_2_T_2(string $description = null)
 * @method static static A_40_P_2_T_3(string $description = null)
 * @method static static A_40_P_3(string $description = null)
 * @method static static A_40_P_4(string $description = null)
 * @method static static A_40_P_5(string $description = null)
 * @method static static A_40_P_6(string $description = null)
 * @method static static A_40_P_7(string $description = null)
 * @method static static A_40_P_8(string $description = null)
 * @method static static A_41_P_1(string $description = null)
 * @method static static A_41_P_2(string $description = null)
 * @method static static A_41_P_3(string $description = null)
 * @method static static A_43_P_1(string $description = null)
 * @method static static DEATH(string $description = null)
 */
final class DismissalReason extends Reference
{
    /**
     * As a non-probationary
     */
    public const A_28 = 1;
    /**
     * By agreement of the parties
     */
    public const A_36_P_1 = 2;
    /**
     * Expiry of the employment contract
     */
    public const A_36_P_2 = 3;
    /**
     * Due to the call to the Armed Forces
     */
    public const A_36_P_3 = 4;
    /**
     * Refusal to continue work due to changes in material working conditions
     */
    public const A_36_P_6_T_1 = 5;
    /**
     * In specification is same as A_36_P_6_T_1
     * @see DismissalReason::A_36_P_6_T_1
     */
    public const A_36_P_6_T_2 = 6;
    /**
     * Refusal to continue work due to with the change in the location of the enterprise
     */
    public const A_36_P_6_T_3 = 7;
    /**
     * The entry into force of a court verdict
     */
    public const A_36_P_7 = 8;
    /**
     * In accordance with the contract
     */
    public const A_36_P_8 = 9;
    /**
     * At his own request
     */
    public const A_38_T_1 = 10;
    /**
     * At his own request (hiring for a competition)
     */
    public const A_38_T_2 = 11;
    /**
     * At his own request (care of a child under 14 years of age)
     */
    public const A_38_T_3 = 12;
    /**
     * At his own request (Due to the change of residence)
     */
    public const A_38_T_4 = 13;
    /**
     * At his own request (admission to an educational institution)
     */
    public const A_38_T_5 = 14;
    /**
     * At his own request (impossibility of residing in this area confirmed by medical conclusion)
     */
    public const A_38_T_6 = 15;
    /**
     * At his own request (pregnancy)
     */
    public const A_38_T_7 = 16;
    /**
     * At his own request (care for a sick family member or a disabled person of the 1st group)
     */
    public const A_38_T_8 = 17;
    /**
     * At his own request (Due to retirement)
     */
    public const A_38_T_9 = 18;
    /**
     * At the initiative of the employee due to illness or disability
     */
    public const A_39 = 19;
    /**
     * Due to the change in the organization of production (liquidation of the enterprise)
     */
    public const A_40_P_1_T_1 = 20;
    /**
     * Due to the change in the organization of production (reorganization of the enterprise)
     */
    public const A_40_P_1_T_2 = 21;
    /**
     * Due to the change in the organization of production (bankruptcy of the enterprise)
     */
    public const A_40_P_1_T_3 = 22;
    /**
     * Due to the change in the organization of production (re-profiling)
     */
    public const A_40_P_1_T_4 = 23;
    /**
     * Due to decrease in the number or staff
     */
    public const A_40_P_1_T_5 = 24;
    /**
     * Non-compliance of an employee with a position (due to lack of qualification)
     */
    public const A_40_P_2_T_1 = 25;
    /**
     * Discrepancy of the employee of the post (for health reasons)
     */
    public const A_40_P_2_T_2 = 26;
    /**
     * not the correspondence of the employee of the post (due to the cancellation of access to state secrets)
     */
    public const A_40_P_2_T_3 = 27;
    /**
     * For the systematic failure to fulfill their duties
     */
    public const A_40_P_3 = 28;
    /**
     * Absenteeism
     */
    public const A_40_P_4 = 29;
    /**
     * Absence at work more than 4 months in connection with temporary incapacity for work
     */
    public const A_40_P_5 = 30;
    /**
     * Restoration of an employee who previously performed this work
     */
    public const A_40_P_6 = 31;
    /**
     * Appearance at work in a state of intoxication
     */
    public const A_40_P_7 = 32;
    /**
     * Theft on the job site
     */
    public const A_40_P_8 = 33;
    /**
     * One-time gross violation of labor obligations
     */
    public const A_41_P_1 = 34;
    /**
     * Due to the loss of trust
     */
    public const A_41_P_2 = 35;
    /**
     * Immoral act
     */
    public const A_41_P_3 = 36;
    /**
     * Hiring a staff member instead of a part-time employee
     */
    public const A_43_P_1 = 37;
    /**
     * Due to death
     */
    public const DEATH = 38;
}
