<?php

namespace Wearesho\Bobra\Ubki\Tests\Data\CreditDeal;

use Carbon\Carbon;

use Wearesho\Bobra\Ubki\Data;
use Wearesho\Bobra\Ubki\Tests;

/**
 * Class EntityTest
 * @internal
 * @package Wearesho\Bobra\Ubki\Tests\Data\CreditDeal
 */
class EntityTest extends Tests\Extend\ElementTestCase
{
    protected const TAG = 'crdeal';

    /** @var Data\CreditDeal\Entity */
    protected $element;

    public function testGetName(): void
    {
        $this->assertEquals(
            'name',
            $this->element->getName()
        );
    }

    public function testGetDealLifes(): void
    {
        $this->assertEquals(
            new Data\CreditDeal\DealLife\Collection([
                new Data\CreditDeal\DealLife\Entity(
                    'identificator',
                    4,
                    2018,
                    Carbon::parse('2018-04-09'),
                    Carbon::parse('2018-05-09'),
                    Data\CreditDeal\Status::OPEN(),
                    10000.00,
                    2400,
                    2400,
                    2400,
                    20,
                    Data\Flag::YES(),
                    Data\Flag::YES(),
                    Data\Flag::YES(),
                    Carbon::parse('2018-04-29'),
                    Carbon::parse('2018-04-29')
                )
            ]),
            $this->element->getDealLifes()
        );
    }

    public function testGetLanguage(): void
    {
        $this->assertEquals(
            Data\Language::ENG(),
            $this->element->getLanguage()
        );
    }

    public function testGetCurrency(): void
    {
        $this->assertEquals(
            Data\Currency::EUR(),
            $this->element->getCurrency()
        );
    }

    public function testGetRepaymentProcedure(): void
    {
        $this->assertEquals(
            Data\CreditDeal\RepaymentProcedure::PAYMENTS_INDIVIDUAL(),
            $this->element->getRepaymentProcedure()
        );
    }

    public function testGetBirthDate(): void
    {
        $this->assertEquals(
            Carbon::parse('1998-03-12'),
            Carbon::instance($this->element->getBirthDate())
        );
    }

    public function testGetSubjectRole(): void
    {
        $this->assertEquals(
            Data\SubjectRole::BORROWER(),
            $this->element->getSubjectRole()
        );
    }

    public function testGetMiddleName(): void
    {
        $this->assertEquals(
            'middle name',
            $this->element->getMiddleName()
        );
    }

    public function testGetCollateral(): void
    {
        $this->assertEquals(
            Data\CreditDeal\Collateral::BANK_METALS(),
            $this->element->getCollateral()
        );
    }

    public function testGetInitialAmount(): void
    {
        $this->assertEquals(
            2400.00,
            $this->element->getInitialAmount()
        );
    }

    public function testGetId(): void
    {
        $this->assertEquals(
            'identificator',
            $this->element->getId()
        );
    }

    public function testGetType(): void
    {
        $this->assertEquals(
            Data\CreditDeal\Type::REPLENISHMENT_WORKING_CAPITAL(),
            $this->element->getType()
        );
    }

    public function testGetCollateralCost(): void
    {
        $this->assertEquals(
            2400,
            $this->element->getCollateralCost()
        );
    }

    public function testGetLastName(): void
    {
        $this->assertEquals(
            'last name',
            $this->element->getLastName()
        );
    }

    public function testGetInn(): void
    {
        $this->assertEquals(
            '1234567890',
            $this->element->getInn()
        );
    }

    public function testJsonSerialize(): void
    {
        $this->assertEquals(
            [
                'id' => 'identificator',
                'language' => 'ENG',
                'name' => 'name',
                'lastName' => 'last name',
                'birthDate' => '1998-03-12',
                'type' => 'REPLENISHMENT_WORKING_CAPITAL',
                'collateral' => 'BANK_METALS',
                'repaymentProcedure' => 'PAYMENTS_INDIVIDUAL',
                'currency' => 'EUR',
                'initialAmount' => 2400.00,
                'subjectRole' => 'BORROWER',
                'collateralCost' => 2400.00,
                'dealLifes' => [
                    [
                        'id' => 'identificator',
                        'periodMonth' => 4,
                        'periodYear' => 2018,
                        'issueDate' => '2018-04-09',
                        'endDate' => '2018-05-09',
                        'status' => 'OPEN',
                        'limit' => 10000.00,
                        'mandatoryPayment' => 2400,
                        'currentDebt' => 2400,
                        'currentOverdueDebt' => 2400,
                        'overdueTime' => 20,
                        'paymentIndication' => 'YES',
                        'delayIndication' => 'YES',
                        'creditTrancheIndication' => 'YES',
                        'paymentDate' => '2018-04-29',
                        'actualEndDate' => '2018-04-29',
                    ]
                ],
                'inn' => '1234567890',
                'middleName' => 'middle name'
            ],
            $this->element->jsonSerialize()
        );
    }

    protected function setUp(): void
    {
        $this->element = new Data\CreditDeal\Entity(
            'identificator',
            Data\Language::ENG(),
            'name',
            'last name',
            Carbon::parse('1998-03-12'),
            Data\CreditDeal\Type::REPLENISHMENT_WORKING_CAPITAL(),
            Data\CreditDeal\Collateral::BANK_METALS(),
            Data\CreditDeal\RepaymentProcedure::PAYMENTS_INDIVIDUAL(),
            Data\Currency::EUR(),
            2400.00,
            Data\SubjectRole::BORROWER(),
            2400,
            new Data\CreditDeal\DealLife\Collection([
                new Data\CreditDeal\DealLife\Entity(
                    'identificator',
                    4,
                    2018,
                    Carbon::parse('2018-04-09'),
                    Carbon::parse('2018-05-09'),
                    Data\CreditDeal\Status::OPEN(),
                    10000.00,
                    2400,
                    2400,
                    2400,
                    20,
                    Data\Flag::YES(),
                    Data\Flag::YES(),
                    Data\Flag::YES(),
                    Carbon::parse('2018-04-29'),
                    Carbon::parse('2018-04-29')
                )
            ]),
            '1234567890',
            'middle name'
        );
    }
}
