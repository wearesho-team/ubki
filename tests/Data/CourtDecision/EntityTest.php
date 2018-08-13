<?php

namespace Wearesho\Bobra\Ubki\Tests\Data\CourtDecision;

use Carbon\Carbon;

use Wearesho\Bobra\Ubki\Data;
use Wearesho\Bobra\Ubki\Tests;

/**
 * Class EntityTest
 * @package Wearesho\Bobra\Ubki\Tests\Data\CourtDecision
 *
 * @internal
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
            Carbon::parse('2018-12-03'),
            1,
            1,
            'name',
            'document_type',
            'document_type_reference',
            'legal_fact',
            'legal_fact_reference',
            Carbon::parse('2018-03-12'),
            'area',
            'area_reference'
        );
    }

    public function testGetters(): void
    {
        $this->assertEquals('name', $this->element->courtName);
        $this->assertEquals('area', $this->element->area);
        $this->assertEquals('1234567890', $this->element->inn);
        $this->assertEquals('document_type', $this->element->documentType);
        $this->assertEquals('document_type_reference', $this->element->documentTypeReference);
        $this->assertEquals(1, $this->element->subjectStatus);
        $this->assertEquals(123456, $this->element->id);
        $this->assertEquals('123456', $this->element->id);
        $this->assertEquals(Carbon::parse('2018-12-03'), Carbon::instance($this->element->date));
        $this->assertEquals('2018-12-03', Carbon::instance($this->element->date)->toDateString());
        $this->assertEquals('legal_fact_reference', $this->element->legalFactReference);
        $this->assertEquals('area_reference', $this->element->areaReference);
        $this->assertEquals('legal_fact', $this->element->legalFact);
        $this->assertEquals(1, $this->element->courtDealType);
        $this->assertEquals(Carbon::parse('2018-03-12'), Carbon::instance($this->element->createdAt));
        $this->assertEquals('2018-03-12', Carbon::instance($this->element->createdAt)->toDateString());
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
