<?php

namespace Wearesho\Bobra\Ubki\Tests\Blocks;

use Carbon\Carbon;

use PHPUnit\Framework\TestCase;

use Wearesho\Bobra\Ubki\Blocks\Collections\CourtDecisions;
use Wearesho\Bobra\Ubki\Blocks\Entities\CourtDecision;
use Wearesho\Bobra\Ubki\Blocks\CourtDecisionsInformation;

/**
 * Class CourtDecisionsInformationTest
 * @package Wearesho\Bobra\Ubki\Tests\Blocks
 * @coversDefaultClass CourtDecisionsInformation
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

    /** @var CourtDecisionsInformation */
    protected $fakeCourtDecisionsInformation;

    protected function setUp(): void
    {
        $this->fakeCourtDecisionsInformation = new CourtDecisionsInformation(
            new CourtDecisions([
                new CourtDecision(
                    static::ID,
                    static::INN,
                    Carbon::parse(static::DATE),
                    static::SUBJECT_STATUS,
                    static::COURT_DEAL_TYPE,
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

    public function testGetDecisionCollection(): void
    {
        $this->assertEquals(
            new CourtDecisions([
                new CourtDecision(
                    static::ID,
                    static::INN,
                    Carbon::parse(static::DATE),
                    static::SUBJECT_STATUS,
                    static::COURT_DEAL_TYPE,
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
