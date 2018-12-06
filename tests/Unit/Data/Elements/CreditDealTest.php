<?php

namespace Wearesho\Bobra\Ubki\Tests\Unit\Data\Elements;

use Wearesho\Bobra\Ubki;

/**
 * Class CreditDealTest
 * @package Wearesho\Bobra\Ubki\Tests\Unit\Data\Elements
 * @coversDefaultClass \Wearesho\Bobra\Ubki\Data\Elements\CreditDeal
 * @internal
 */
class CreditDealTest extends TestCase
{
    use  ArgumentsTrait\CreditDeal;

    protected const ELEMENT = Ubki\Data\Elements\CreditDeal::class;

    public const ID = 'testId';
    public const NAME = 'testName';
    public const SURNAME = 'testSurname';
    public const BIRTH_DATE = '1998-03-12';
    public const INITIAL_AMOUNT = 5000.00;
    public const COLLATERAL_COST = 5000.00;
    public const PERIOD_MONTH = 4;
    public const PERIOD_YEAR = 2012;
    public const ISSUE_DATE = '2018-03-12';
    public const END_DATE = '2019-03-12';
    public const LIMIT = 10000;
    public const MANDATORY_PAYMENT = 2000;
    public const CURRENT_DEBT = 2400.45;
    public const CURRENT_OVERDUE_DEBT = 2200;
    public const OVERDUE_TIME = 20;
    public const PAYMENT_DATE = '2018-03-12';
    public const ACTUAL_END_DATE = '2019-02-01';
    public const INN = 'testInn';
    public const PATRONYMIC = 'testPatronymic';
    public const SOURCE = 'testSource';

    protected function jsonKeys(): array
    {
        return [
            Ubki\Data\Interfaces\CreditDeal::ID,
            Ubki\Data\Interfaces\CreditDeal::LANGUAGE,
            Ubki\Data\Interfaces\CreditDeal::NAME,
            Ubki\Data\Interfaces\CreditDeal::SURNAME,
            Ubki\Data\Interfaces\CreditDeal::BIRTH_DATE,
            Ubki\Data\Interfaces\CreditDeal::TYPE,
            Ubki\Data\Interfaces\CreditDeal::COLLATERAL,
            Ubki\Data\Interfaces\CreditDeal::REPAYMENT_PROCEDURE,
            Ubki\Data\Interfaces\CreditDeal::CURRENCY,
            Ubki\Data\Interfaces\CreditDeal::INITIAL_AMOUNT,
            Ubki\Data\Interfaces\CreditDeal::SUBJECT_ROLE,
            Ubki\Data\Interfaces\CreditDeal::COLLATERAL_COST,
            'dealLifes',
            Ubki\Data\Interfaces\CreditDeal::INN,
            Ubki\Data\Interfaces\CreditDeal::PATRONYMIC,
            Ubki\Data\Interfaces\CreditDeal::SOURCE,
        ];
    }

    protected function getExpectTag(): string
    {
        return Ubki\Data\Interfaces\CreditDeal::TAG;
    }

    protected function attributesNames(): array
    {
        return [
            'id',
            'language',
            'name',
            'surname',
            'birthDate',
            'type',
            'collateral',
            'repaymentProcedure',
            'currency',
            'initialAmount',
            'subjectRole',
            'collateralCost',
            'dealLifes',
            'inn',
            'patronymic',
            'source',
        ];
    }
}
