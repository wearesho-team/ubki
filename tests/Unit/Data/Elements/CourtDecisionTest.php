<?php

namespace Wearesho\Bobra\Ubki\Tests\Unit\Data\Elements;

use Wearesho\Bobra\Ubki;

/**
 * Class CourtDecisionTest
 * @package Wearesho\Bobra\Ubki\Tests\Unit\Data\Elements
 * @coversDefaultClass \Wearesho\Bobra\Ubki\Data\Elements\CourtDecision
 * @internal
 */
class CourtDecisionTest extends Ubki\Tests\Unit\Data\TestCase
{
    use ArgumentsTrait\CourtDecision;

    protected const ELEMENT = Ubki\Data\Elements\CourtDecision::class;

    public const ID = 'testId';
    public const INN = 'testInn';
    public const DATE = '2018-03-12';
    public const COURT_NAME = 'testCourtName';
    public const DOCUMENT_TYPE = 'testDocumentType';
    public const DOCUMENT_TYPE_REFERENCE = 'testDocumentTypeReference';
    public const LEGAL_FACT = 'testLegalFact';
    public const LEGAL_FACT_REFERENCE = 'testLegalFactReference';
    public const CREATED_AT = '2018-03-12';
    public const AREA = 'testArea';
    public const AREA_REFERENCE = 'testAreaReference';

    protected function getExpectTag(): string
    {
        return Ubki\Data\Interfaces\CourtDecision::TAG;
    }

    protected function attributesNames(): array
    {
        return [
            'id',
            'inn',
            'date',
            'subjectStatus',
            'courtDealType',
            'courtName',
            'documentType',
            'documentTypeReference',
            'legalFact',
            'legalFactReference',
            'createdAt',
            'area',
            'areaReference'
        ];
    }
}
