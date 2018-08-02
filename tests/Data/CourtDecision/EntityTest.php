<?php

namespace Wearesho\Bobra\Ubki\Tests\Data\CourtDecision;

use Carbon\Carbon;
use Wearesho\Bobra\Ubki\Data;
use Wearesho\Bobra\Ubki\Tests;

/**
 * Class EntityTest
 * @internal
 * @package Wearesho\Bobra\Ubki\Tests\Data\CourtDecision
 */
class EntityTest extends Tests\Extend\ElementTestCase
{
    protected const TAG = 'susd';

    /** @var Data\CourtDecision\Entity */
    protected $element;

    protected function setUp(): void
    {
        $this->element = new Data\CourtDecision\Entity(
            123456,
            '1234567890',
            Carbon::create(2018, 12, 3),
            1,
            1,
            'name',
            'document_type',
            'document_type_reference',
            'legal_fact',
            'legal_fact_reference',
            Carbon::create(2018, 3, 12),
            'area',
            'area_reference'
        );
    }

    public function testGetCourtName(): void
    {
        $this->assertEquals(
            'name',
            $this->element->getCourtName()
        );
    }

    public function testGetArea(): void
    {
        $this->assertEquals(
            'area',
            $this->element->getArea()
        );
    }

    public function testGetInn(): void
    {
        $this->assertEquals(
            '1234567890',
            $this->element->getInn()
        );
    }

    public function testGetDocumentType(): void
    {
        $this->assertEquals(
            'document_type',
            $this->element->getDocumentType()
        );
    }

    public function testGetDocumentTypeReference(): void
    {
        $this->assertEquals(
            'document_type_reference',
            $this->element->getDocumentTypeReference()
        );
    }

    public function testGetSubjectStatus(): void
    {
        $this->assertEquals(
            1,
            $this->element->getSubjectStatus()
        );
    }

    public function testGetId(): void
    {
        $this->assertEquals(
            123456,
            $this->element->getId()
        );
    }

    public function testGetDate(): void
    {
        $date = Carbon::instance($this->element->getDate());

        $this->assertEquals(
            Carbon::create(2018, 12, 3),
            $date
        );
        $this->assertEquals(
            '2018-12-03',
            $date->toDateString()
        );
    }

    public function testGetLegalFactReference(): void
    {
        $this->assertEquals(
            'legal_fact_reference',
            $this->element->getLegalFactReference()
        );
    }

    public function testGetAreaReference(): void
    {
        $this->assertEquals(
            'area_reference',
            $this->element->getAreaReference()
        );
    }

    public function testGetLegalFact(): void
    {
        $this->assertEquals(
            'legal_fact',
            $this->element->getLegalFact()
        );
    }

    public function testGetCourtDealType(): void
    {
        $this->assertEquals(
            1,
            $this->element->getCourtDealType()
        );
    }

    public function testGetCreatedAt(): void
    {
        $createdAt = Carbon::instance($this->element->getCreatedAt());

        $this->assertEquals(
            Carbon::create(2018, 3, 12),
            $createdAt
        );
        $this->assertEquals(
            '2018-03-12',
            $createdAt->toDateString()
        );
    }

    public function testJsonSerialize(): void
    {
        $this->assertEquals(
            [
                'id' => '123456',
                'inn' => '1234567890',
                'date' => '2018-12-03',
                'subjectStatus' => 1,
                'courtDealType' => 1,
                'courtName' => 'name',
                'documentType' => 'document_type',
                'documentTypeReference' => 'document_type_reference',
                'legalFact' => 'legal_fact',
                'legalFactReference' => 'legal_fact_reference',
                'createdAt' => '2018-03-12',
                'area' => 'area',
                'areaReference' => 'area_reference'
            ],
            $this->element->jsonSerialize()
        );
    }
}
