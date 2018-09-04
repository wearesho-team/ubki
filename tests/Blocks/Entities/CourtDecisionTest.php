<?php

namespace Wearesho\Bobra\Ubki\Tests\Blocks\Entities;

use Carbon\Carbon;

use PHPUnit\Framework\TestCase;

use Wearesho\Bobra\Ubki\Data\Elements\CourtDecision;

/**
 * Class CourtDecisionTest
 * @package Wearesho\Bobra\Ubki\Tests\Data\Elements
 * @coversDefaultClass CourtDecision
 * @internal
 */
class CourtDecisionTest extends TestCase
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

    /** @var CourtDecision */
    protected $fakeCourtDecision;

    protected function setUp(): void
    {
        $this->fakeCourtDecision = new CourtDecision(
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
        );
    }

    public function testJsonSerialize(): void
    {
        $this->assertArraySubset(
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
            $this->fakeCourtDecision->jsonSerialize()
        );
    }

    public function testGetCreatedAt(): void
    {
        $this->assertEquals(
            static::CREATED_AT,
            Carbon::instance($this->fakeCourtDecision->getCreatedAt())->toDateString()
        );
    }

    public function testGetCourtName(): void
    {
        $this->assertEquals(
            static::COURT_NAME,
            $this->fakeCourtDecision->getCourtName()
        );
    }

    public function testGetArea(): void
    {
        $this->assertEquals(
            static::AREA,
            $this->fakeCourtDecision->getArea()
        );
    }

    public function testGetLegalFactReference(): void
    {
        $this->assertEquals(
            static::LEGAL_FACT_REFERENCE,
            $this->fakeCourtDecision->getLegalFactReference()
        );
    }

    public function testGetInn(): void
    {
        $this->assertEquals(
            static::INN,
            $this->fakeCourtDecision->getInn()
        );
    }

    public function testGetSubjectStatus(): void
    {
        $this->assertEquals(
            static::SUBJECT_STATUS,
            $this->fakeCourtDecision->getSubjectStatus()
        );
    }

    public function testGetCourtDealType(): void
    {
        $this->assertEquals(
            static::COURT_DEAL_TYPE,
            $this->fakeCourtDecision->getCourtDealType()
        );
    }

    public function testGetDocumentType(): void
    {
        $this->assertEquals(
            static::DOCUMENT_TYPE,
            $this->fakeCourtDecision->getDocumentType()
        );
    }

    public function testGetLegalFact(): void
    {
        $this->assertEquals(
            static::LEGAL_FACT,
            $this->fakeCourtDecision->getLegalFact()
        );
    }

    public function testGetAreaReference(): void
    {
        $this->assertEquals(
            static::AREA_REFERENCE,
            $this->fakeCourtDecision->getAreaReference()
        );
    }

    public function testGetDate(): void
    {
        $this->assertEquals(
            static::DATE,
            Carbon::instance($this->fakeCourtDecision->getDate())->toDateString()
        );
    }

    public function testGetDocumentTypeReference(): void
    {
        $this->assertEquals(
            static::DOCUMENT_TYPE_REFERENCE,
            $this->fakeCourtDecision->getDocumentTypeReference()
        );
    }

    public function testGetId(): void
    {
        $this->assertEquals(
            static::ID,
            $this->fakeCourtDecision->getId()
        );
    }
}
