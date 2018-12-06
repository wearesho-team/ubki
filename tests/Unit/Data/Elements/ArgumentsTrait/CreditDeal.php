<?php

namespace Wearesho\Bobra\Ubki\Tests\Unit\Data\Elements\ArgumentsTrait;

use Carbon\Carbon;
use Wearesho\Bobra\Ubki;
use Wearesho\Bobra\Ubki\Data;

/**
 * Trait CreditDeal
 * @package Wearesho\Bobra\Ubki\Tests\Unit\Data\Elements\ArgumentsTrait
 */
trait CreditDeal
{
    use DealLife {
        arguments as protected lifeArguments;
    }

    protected function arguments(): array
    {
        return [
            Ubki\Tests\Unit\Data\Elements\CreditDealTest::ID,
            Ubki\Dictionaries\Language::RUS(),
            Ubki\Tests\Unit\Data\Elements\CreditDealTest::NAME,
            Ubki\Tests\Unit\Data\Elements\CreditDealTest::SURNAME,
            Carbon::parse(Ubki\Tests\Unit\Data\Elements\CreditDealTest::BIRTH_DATE),
            Ubki\Dictionaries\CreditDealType::COMMERCIAL_CREDIT(),
            Ubki\Dictionaries\CollateralType::R_1(),
            Ubki\Dictionaries\RepaymentProcedure::PERIODIC_MONTH(),
            Ubki\Dictionaries\Currency::UAH(),
            Ubki\Tests\Unit\Data\Elements\CreditDealTest::INITIAL_AMOUNT,
            Ubki\Dictionaries\SubjectRole::BORROWER(),
            Ubki\Tests\Unit\Data\Elements\CreditDealTest::COLLATERAL_COST,
            $this->faker->collection->type(Data\Collections\DealLifes::class)
                ->fill(99, $this->faker->element->with($this->lifeArguments())->make(Data\Elements\DealLife::class))
                ->get(),
            Ubki\Tests\Unit\Data\Elements\CreditDealTest::INN,
            Ubki\Tests\Unit\Data\Elements\CreditDealTest::PATRONYMIC,
            Ubki\Tests\Unit\Data\Elements\CreditDealTest::SOURCE
        ];
    }
}
