<?php

namespace Wearesho\Bobra\Ubki\Tests\Unit\Data\Elements;

use Carbon\Carbon;
use PHPUnit\Framework\TestCase;
use Wearesho\Bobra\Ubki;

/**
 * Class CourtDecisionTest
 * @package Wearesho\Bobra\Ubki\Tests\Unit\Data\Elements
 * @coversDefaultClass \Wearesho\Bobra\Ubki\Data\Elements\CourtDecision
 * @internal
 */
class CourtDecisionTest extends TestCase
{
    protected const ID = 'testId';
    protected const INN = 'testInn';
    protected const DATE = '2018-03-12';
    protected const COURT_NAME = 'testCourtName';
    protected const DOCUMENT_TYPE = 'testDocumentType';
    protected const DOCUMENT_TYPE_REFERENCE = 'testDocumentTypeReference';
    protected const LEGAL_FACT = 'testLegalFact';
    protected const LEGAL_FACT_REFERENCE = 'testLegalFactReference';
    protected const CREATED_AT = '2018-03-12';
    protected const AREA = 'testArea';
    protected const AREA_REFERENCE = 'testAreaReference';

    /** @var Ubki\Data\Elements\CourtDecision */
    protected $fakeCourtDecision;

    protected function setUp(): void
    {
        $this->fakeCourtDecision = new Ubki\Data\Elements\CourtDecision(
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
        );
    }

    public function testJsonSerialize(): void
    {
        $this->assertArraySubset(
            [
                Ubki\Data\Interfaces\CourtDecision::ID => static::ID,
                Ubki\Data\Interfaces\CourtDecision::INN => static::INN,
                Ubki\Data\Interfaces\CourtDecision::DATE => Carbon::parse(static::DATE),
                Ubki\Data\Interfaces\CourtDecision::SUBJECT_STATUS => Ubki\Dictionaries\CourtSubjectStatus::PLAINTIFF(),
                Ubki\Data\Interfaces\CourtDecision::COURT_DEAL_TYPE => Ubki\Dictionaries\CourtDealType::ECONOMIC(),
                Ubki\Data\Interfaces\CourtDecision::COURT_NAME => static::COURT_NAME,
                Ubki\Data\Interfaces\CourtDecision::DOCUMENT_TYPE => static::DOCUMENT_TYPE,
                Ubki\Data\Interfaces\CourtDecision::DOCUMENT_TYPE_REF => static::DOCUMENT_TYPE_REFERENCE,
                Ubki\Data\Interfaces\CourtDecision::LEGAL_FACT => static::LEGAL_FACT,
                Ubki\Data\Interfaces\CourtDecision::LEGAL_FACT_REF => static::LEGAL_FACT_REFERENCE,
                Ubki\Data\Interfaces\CourtDecision::CREATED_AT => Carbon::parse(static::CREATED_AT),
                Ubki\Data\Interfaces\CourtDecision::AREA => static::AREA,
                Ubki\Data\Interfaces\CourtDecision::AREA_REF => static::AREA_REFERENCE
            ],
            $this->fakeCourtDecision->jsonSerialize()
        );
    }

    public function testTag(): void
    {
        $this->assertEquals(
            Ubki\Data\Interfaces\CourtDecision::TAG,
            $this->fakeCourtDecision->tag()
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
            Ubki\Dictionaries\CourtSubjectStatus::PLAINTIFF(),
            $this->fakeCourtDecision->getSubjectStatus()
        );
    }

    public function testGetCourtDealType(): void
    {
        $this->assertEquals(
            Ubki\Dictionaries\CourtDealType::ECONOMIC(),
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
