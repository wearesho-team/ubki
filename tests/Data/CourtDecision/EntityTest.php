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
    protected $block;

    protected function setUp(): void
    {
        $this->block = new Data\CourtDecision\Entity(
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
            $this->block->getCourtName()
        );
    }

    public function testGetArea(): void
    {
        $this->assertEquals(
            'area',
            $this->block->getArea()
        );
    }

    public function testGetInn(): void
    {
        $this->assertEquals(
            '1234567890',
            $this->block->getInn()
        );
    }

    public function testGetDocumentType(): void
    {
        $this->assertEquals(
            'document_type',
            $this->block->getDocumentType()
        );
    }

    public function testGetDocumentTypeReference(): void
    {
        $this->assertEquals(
            'document_type_reference',
            $this->block->getDocumentTypeReference()
        );
    }

    public function testGetSubjectStatus(): void
    {
        $this->assertEquals(
            1,
            $this->block->getSubjectStatus()
        );
    }

    public function testGetId(): void
    {
        $this->assertEquals(
            123456,
            $this->block->getId()
        );
    }

    public function testGetDate(): void
    {
        $date = Carbon::instance($this->block->getDate());

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
            $this->block->getLegalFactReference()
        );
    }

    public function testGetAreaReference(): void
    {
        $this->assertEquals(
            'area_reference',
            $this->block->getAreaReference()
        );
    }

    public function testGetLegalFact(): void
    {
        $this->assertEquals(
            'legal_fact',
            $this->block->getLegalFact()
        );
    }

    public function testGetCourtDealType(): void
    {
        $this->assertEquals(
            1,
            $this->block->getCourtDealType()
        );
    }

    public function testGetCreatedAt(): void
    {
        $createdAt = Carbon::instance($this->block->getCreatedAt());

        $this->assertEquals(
            Carbon::create(2018, 3, 12),
            $createdAt
        );
        $this->assertEquals(
            '2018-03-12',
            $createdAt->toDateString()
        );
    }
}
