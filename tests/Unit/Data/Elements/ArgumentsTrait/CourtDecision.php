<?php

namespace Wearesho\Bobra\Ubki\Tests\Unit\Data\Elements\ArgumentsTrait;

use Carbon\Carbon;
use Wearesho\Bobra\Ubki;

/**
 * Trait CourtDecision
 * @package Wearesho\Bobra\Ubki\Tests\Unit\Data\Elements\ArgumentsTrait
 */
trait CourtDecision
{
    protected function arguments(): array
    {
        return [
            Ubki\Tests\Unit\Data\Elements\CourtDecisionTest::ID,
            Ubki\Tests\Unit\Data\Elements\CourtDecisionTest::INN,
            Carbon::parse(Ubki\Tests\Unit\Data\Elements\CourtDecisionTest::DATE),
            Ubki\Dictionaries\CourtSubjectStatus::PLAINTIFF(),
            Ubki\Dictionaries\CourtDealType::ECONOMIC(),
            Ubki\Tests\Unit\Data\Elements\CourtDecisionTest::COURT_NAME,
            Ubki\Tests\Unit\Data\Elements\CourtDecisionTest::DOCUMENT_TYPE,
            Ubki\Tests\Unit\Data\Elements\CourtDecisionTest::DOCUMENT_TYPE_REFERENCE,
            Ubki\Tests\Unit\Data\Elements\CourtDecisionTest::LEGAL_FACT,
            Ubki\Tests\Unit\Data\Elements\CourtDecisionTest::LEGAL_FACT_REFERENCE,
            Carbon::parse(Ubki\Tests\Unit\Data\Elements\CourtDecisionTest::CREATED_AT),
            Ubki\Tests\Unit\Data\Elements\CourtDecisionTest::AREA,
            Ubki\Tests\Unit\Data\Elements\CourtDecisionTest::AREA_REFERENCE
        ];
    }
}
