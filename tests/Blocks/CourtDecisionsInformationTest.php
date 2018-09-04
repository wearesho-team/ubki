<?php

namespace Wearesho\Bobra\Ubki\Tests\Blocks;

use Carbon\Carbon;

use PHPUnit\Framework\TestCase;

use Wearesho\Bobra\Ubki\Data\Collections\CourtDecisions;
use Wearesho\Bobra\Ubki\Data\Elements\CourtDecision;
use Wearesho\Bobra\Ubki\Data\CourtDecisionsInformation;

/**
 * Class CourtDecisionsInformationTest
 * @package Wearesho\Bobra\Ubki\Tests\Data
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

    public function testJsonSerialize(): void
    {
        $this->assertArraySubset(
            [
                'courtReports' => [
                    [
                        'id' => static::ID,
                        'inn' => static::INN,
                        'date' => static::DATE,
                        'subjectStatus' => static::SUBJECT_STATUS,
                        'courtDealType' => static::COURT_DEAL_TYPE,
                        'courtName' => static::COURT_NAME,
                        'documentType' => static::DOCUMENT_TYPE,
                        'documentTypeReference' => static::DOCUMENT_TYPE_REFERENCE,
                        'legalFact' => static::LEGAL_FACT,
                        'legalFactReference' => static::LEGAL_FACT_REFERENCE,
                        'createdAt' => static::CREATED_AT,
                        'area' => static::AREA,
                        'areaReference' => static::AREA_REFERENCE
                    ],
                ],
            ],
            $this->fakeCourtDecisionsInformation->jsonSerialize()
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
