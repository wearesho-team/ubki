<?php

declare(strict_types=1);

namespace Wearesho\Bobra\Ubki\Tests\Unit\Data;

use Carbon\Carbon;
use Wearesho\Bobra\Ubki;

/**
 * Class CourtDecisionTest
 * @package Wearesho\Bobra\Ubki\Tests\Unit\Data
 */
class CourtDecisionTest extends Ubki\Tests\Unit\TestCase
{
    protected const ID = 'id';
    protected const INN = '1234567890';
    protected const DATE = '2018-03-12';
    protected const COURT_NAME = 'courtName';
    protected const DOCUMENT_TYPE = 'documentType';
    protected const DOCUMENT_TYPE_REFERENCE = 'documentTypeReference';
    protected const LEGAL_FACT = 'legalFact';
    protected const LEGAL_FACT_REFERENCE = 'legalFactReference';
    protected const CREATED_AT = '2018-03-03';
    protected const AREA = 'area';
    protected const AREA_REFERENCE = 'areaReference';

    /** @var Ubki\Data\CourtDecision */
    protected $courtDecision;

    protected function setUp(): void
    {
        $this->courtDecision = new Ubki\Data\CourtDecision(
            static::ID,
            static::INN,
            Carbon::parse(static::DATE),
            Ubki\Dictionary\CourtSubject::PLAINTIFF(),
            Ubki\Dictionary\CourtDeal::CIVIL(),
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

    public function testGetId(): void
    {
        $this->assertEquals(static::ID, $this->courtDecision->getId());
    }

    public function testGetInn(): void
    {
        $this->assertEquals(static::INN, $this->courtDecision->getInn());
    }

    public function testInvalidInn(): void
    {
        $invalidInn = 'invalidInn';
        $this->expectValidationException($invalidInn, Ubki\Validator::INN());

        new Ubki\Data\CourtDecision(
            static::ID,
            $invalidInn,
            Carbon::parse(static::DATE),
            Ubki\Dictionary\CourtSubject::PLAINTIFF(),
            Ubki\Dictionary\CourtDeal::CIVIL(),
            static::COURT_NAME,
            static::DOCUMENT_TYPE
        );
    }

    public function testGetDate(): void
    {
        $this->assertEquals(Carbon::parse(static::DATE), $this->courtDecision->getDate());
    }

    public function testGetSubjectStatus(): void
    {
        $this->assertEquals(Ubki\Dictionary\CourtSubject::PLAINTIFF(), $this->courtDecision->getSubjectStatus());
    }

    public function testGetCourtDealType(): void
    {
        $this->assertEquals(Ubki\Dictionary\CourtDeal::CIVIL(), $this->courtDecision->getCourtDealType());
    }

    public function testGetCourtName(): void
    {
        $this->assertEquals(static::COURT_NAME, $this->courtDecision->getCourtName());
    }

    public function testInvalidCourtName(): void
    {
        $invalidCourtName = 'invalidCourtName+';
        $this->expectValidationException($invalidCourtName, Ubki\Validator::JUST_TEXT_100());

        new Ubki\Data\CourtDecision(
            static::ID,
            static::INN,
            Carbon::parse(static::DATE),
            Ubki\Dictionary\CourtSubject::PLAINTIFF(),
            Ubki\Dictionary\CourtDeal::CIVIL(),
            $invalidCourtName,
            static::DOCUMENT_TYPE
        );
    }

    public function testGetDocumentType(): void
    {
        $this->assertEquals(static::DOCUMENT_TYPE, $this->courtDecision->getDocumentType());
    }

    public function testGetDocumentTypeReference(): void
    {
        $this->assertEquals(static::DOCUMENT_TYPE_REFERENCE, $this->courtDecision->getDocumentTypeReference());
    }

    public function testGetLegalFact(): void
    {
        $this->assertEquals(static::LEGAL_FACT, $this->courtDecision->getLegalFact());
    }

    public function testGetLegalFactReference(): void
    {
        $this->assertEquals(static::LEGAL_FACT_REFERENCE, $this->courtDecision->getLegalFactReference());
    }

    public function testGetCreatedAt(): void
    {
        $this->assertEquals(Carbon::parse(static::CREATED_AT), $this->courtDecision->getCreatedAt());
    }

    public function testGetArea(): void
    {
        $this->assertEquals(static::AREA, $this->courtDecision->getArea());
    }

    public function testGetAreaReference(): void
    {
        $this->assertEquals(static::AREA_REFERENCE, $this->courtDecision->getAreaReference());
    }
}
