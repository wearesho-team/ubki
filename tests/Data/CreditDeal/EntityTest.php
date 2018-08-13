<?php

namespace Wearesho\Bobra\Ubki\Tests\Data\CreditDeal;

use Carbon\Carbon;

use Wearesho\Bobra\Ubki\Data;
use Wearesho\Bobra\Ubki\Tests;

/**
 * Class EntityTest
 * @package Wearesho\Bobra\Ubki\Tests\Data\CreditDeal
 *
 * @internal
 */
class EntityTest extends Tests\Extend\ElementTestCase
{
    protected const TAG = 'crdeal';

    /** @var Data\CreditDeal\Entity */
    protected $element;

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
            'middle name',
            'MFO'
        );
    }

    public function testGetName(): void
    {
        $expected = 'name';
        $this->assertEquals($expected, $this->element->name);
        $this->assertEquals($expected, $this->element->getName());
    }

    public function testGetDealLifes(): void
    {
        $expected = new Data\CreditDeal\DealLife\Collection([
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
        ]);
        $this->assertEquals($expected, $this->element->dealLifes);
        $this->assertEquals($expected, $this->element->getDealLifes());
    }

    public function testGetLanguage(): void
    {
        $expected = Data\Language::ENG();
        $this->assertEquals($expected, $this->element->language);
        $this->assertEquals($expected, $this->element->getLanguage());
    }

    public function testGetCurrency(): void
    {
        $expected = Data\Currency::EUR();
        $this->assertEquals($expected, $this->element->currency);
        $this->assertEquals($expected, $this->element->getCurrency());
    }

    public function testGetRepaymentProcedure(): void
    {
        $expected = Data\CreditDeal\RepaymentProcedure::PAYMENTS_INDIVIDUAL();
        $this->assertEquals($expected, $this->element->repaymentProcedure);
        $this->assertEquals($expected, $this->element->getRepaymentProcedure());
    }

    public function testGetBirthDate(): void
    {
        $expected = Carbon::parse('1998-03-12');
        $this->assertEquals($expected, Carbon::instance($this->element->birthDate));
        $this->assertEquals($expected, Carbon::instance($this->element->getBirthDate()));
    }

    public function testGetSubjectRole(): void
    {
        $expected = Data\SubjectRole::BORROWER();
        $this->assertEquals($expected, $this->element->subjectRole);
        $this->assertEquals($expected, $this->element->getSubjectRole());
    }

    public function testGetPatronymic(): void
    {
        $expected = 'middle name';
        $this->assertEquals($expected, $this->element->patronymic);
        $this->assertEquals($expected, $this->element->getPatronymic());
    }

    public function testGetCollateral(): void
    {
        $expected = Data\CreditDeal\Collateral::BANK_METALS();
        $this->assertEquals($expected, $this->element->collateral);
        $this->assertEquals($expected, $this->element->getCollateral());
    }

    public function testGetInitialAmount(): void
    {
        $expected = 2400.00;
        $this->assertEquals($expected, $this->element->initialAmount);
        $this->assertEquals($expected, $this->element->getInitialAmount());
    }

    public function testGetId(): void
    {
        $expected = 'identificator';
        $this->assertEquals($expected, $this->element->id);
        $this->assertEquals($expected, $this->element->getId());
    }

    public function testGetType(): void
    {
        $expected = Data\CreditDeal\Type::REPLENISHMENT_WORKING_CAPITAL();
        $this->assertEquals($expected, $this->element->type);
        $this->assertEquals($expected, $this->element->getType());
    }

    public function testGetCollateralCost(): void
    {
        $expected = 2400;
        $this->assertEquals($expected, $this->element->collateralCost);
        $this->assertEquals($expected, $this->element->getCollateralCost());
    }

    public function testGetSurname(): void
    {
        $expected = 'last name';
        $this->assertEquals($expected, $this->element->surname);
        $this->assertEquals($expected, $this->element->getSurname());
    }

    public function testGetInn(): void
    {
        $expected = '1234567890';
        $this->assertEquals($expected, $this->element->inn);
        $this->assertEquals($expected, $this->element->getInn());
    }

    public function testGetSource(): void
    {
        $expected = 'MFO';
        $this->assertEquals($expected, $this->element->source);
        $this->assertEquals($expected, $this->element->getSource());
    }

    public function testJsonSerialize(): void
    {
        $this->assertArraySubset(
            [
                'id' => 'identificator',
                'language' => 'ENG',
                'name' => 'name',
                'surname' => 'last name',
                'inn' => '1234567890',
                'patronymic' => 'middle name',
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
                'source' => 'MFO'
            ],
            $this->element->jsonSerialize()
        );
    }
}
