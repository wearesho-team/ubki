<?php

namespace Wearesho\Bobra\Ubki\Tests\Unit\Data\Blocks;

use Carbon\Carbon;
use PHPUnit\Framework\TestCase;
use Wearesho\Bobra\Ubki;

/**
 * Class CourtDecisionsInformationTest
 * @package Wearesho\Bobra\Ubki\Tests\Unit\Data\Blocks
 * @coversDefaultClass \Wearesho\Bobra\Ubki\Data\Blocks\CourtDecisionsInformation
 * @internal
 */
class CourtDecisionsInformationTest extends TestCase
{
    protected const ID = 'testId';
    protected const INN = 'testInn';
    protected const DATE = '2018-03-12';
    protected const SUBJECT_STATUS = 1;
    protected const COURT_DEAL_TYPE = 2;
    protected const COURT_NAME = 'testCourtName';
    protected const DOCUMENT_TYPE = 'testDocumentType';
    protected const DOCUMENT_TYPE_REFERENCE = 'testDocumentTypeReference';
    protected const LEGAL_FACT = 'testLegalFact';
    protected const LEGAL_FACT_REFERENCE = 'testLegalFactReference';
    protected const CREATED_AT = '2018-03-12';
    protected const AREA = 'testArea';
    protected const AREA_REFERENCE = 'testAreaReference';

    /** @var Ubki\Data\BLocks\CourtDecisionsInformation */
    protected $fakeCourtDecisionsInformation;

    protected function setUp(): void
    {
        $this->fakeCourtDecisionsInformation = new Ubki\Data\Blocks\CourtDecisionsInformation(
            new Ubki\Data\Collections\CourtDecisions([
                new Ubki\Data\Elements\CourtDecision(
                    static::ID,
                    static::INN,
                    Carbon::parse(static::DATE),
                    Ubki\Dictionaries\CourtSubjectStatus::PLAINTIFF(),
                    Ubki\Dictionaries\CourtDealType::ECONOMIC(),
                    static::COURT_NAME,
                    static::DOCUMENT_TYPE,
                    static::DOCUMENT_TYPE_REFERENCE,
                    static::LEGAL_FACT,
                    static::LEGAL_FACT_REFERENCE,
                    Carbon::parse(static::CREATED_AT),
                    static::AREA,
                    static::AREA_REFERENCE
                )
            ])
        );
    }

    public function testJsonSerialize(): void
    {
        $this->assertArraySubset(
            [
                new Ubki\Data\Elements\CourtDecision(
                    static::ID,
                    static::INN,
                    Carbon::parse(static::DATE),
                    Ubki\Dictionaries\CourtSubjectStatus::PLAINTIFF(),
                    Ubki\Dictionaries\CourtDealType::ECONOMIC(),
                    static::COURT_NAME,
                    static::DOCUMENT_TYPE,
                    static::DOCUMENT_TYPE_REFERENCE,
                    static::LEGAL_FACT,
                    static::LEGAL_FACT_REFERENCE,
                    Carbon::parse(static::CREATED_AT),
                    static::AREA,
                    static::AREA_REFERENCE
                ),
            ],
            $this->fakeCourtDecisionsInformation->jsonSerialize()
        );
    }

    public function testTag(): void
    {
        $this->assertEquals(
            Ubki\Data\Blocks\CourtDecisionsInformation::TAG,
            $this->fakeCourtDecisionsInformation->tag()
        );
    }

    public function testGetDecisionCollection(): void
    {
        $this->assertEquals(
            new Ubki\Data\Collections\CourtDecisions([
                new Ubki\Data\Elements\CourtDecision(
                    static::ID,
                    static::INN,
                    Carbon::parse(static::DATE),
                    Ubki\Dictionaries\CourtSubjectStatus::PLAINTIFF(),
                    Ubki\Dictionaries\CourtDealType::ECONOMIC(),
                    static::COURT_NAME,
                    static::DOCUMENT_TYPE,
                    static::DOCUMENT_TYPE_REFERENCE,
                    static::LEGAL_FACT,
                    static::LEGAL_FACT_REFERENCE,
                    Carbon::parse(static::CREATED_AT),
                    static::AREA,
                    static::AREA_REFERENCE
                )
            ]),
            $this->fakeCourtDecisionsInformation->getDecisionCollection()
        );
    }
}
