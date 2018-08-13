<?php

namespace Wearesho\Bobra\Ubki\Data\CourtDecision;

use Carbon\Carbon;

use Wearesho\Bobra\Ubki\Element;

/**
 * Class Entity
 * @package Wearesho\Bobra\Ubki\Data\CourtDecision
 *
 * @property-read string                  $id
 * @property-read string                  $inn
 * @property-read \DateTimeInterface      $date
 * @property-read int                     $subjectStatus
 * @property-read int                     $courtDealType
 * @property-read string                  $courtName
 * @property-read string|null             $legalFact
 * @property-read string|null             $legalFactReference
 * @property-read \DateTimeInterface|null $createdAt
 * @property-read string                  $documentType
 * @property-read string                  $documentTypeReference
 * @property-read string|null             $area
 * @property-read string|null             $areaReference
 */
class Entity extends Element implements \JsonSerializable
{
    public const TAG = 'susd';

    public const ID = 'voteid';
    public const INN = 'inn';
    public const DATE = 'votedate';
    public const SUBJECT_STATUS = 'voteusrst';
    public const SUBJECT_STATUS_REF = 'voteusrstref';
    public const COURT_DEAL_TYPE = 'votetype';
    public const COURT_DEAL_TYPE_REF = 'votetyperef';
    public const COURT_NAME = 'votesudname';
    public const LEGAL_FACT = 'voteurfact';
    public const LEGAL_FACT_REF = 'voteurfactref';
    public const CREATED_AT = 'vdate';
    public const DOCUMENT_TYPE = 'votedoctype';
    public const DOCUMENT_TYPE_REF = 'votedoctyperef';
    public const AREA = 'votesudregion';
    public const AREA_REF = 'votesudregionref';
    
    public function __construct(
        string $id,
        string $inn,
        \DateTimeInterface $date,
        int $subjectStatus,
        int $courtDealType,
        string $courtName,
        string $documentType,
        string $documentTypeReference,
        ?string $legalFact = null,
        ?string $legalFactReference = null,
        ?\DateTimeInterface $createdAt = null,
        ?string $area = null,
        ?string $areaReference = null
    ) {
        parent::__construct([
            'id' => $id,
            'inn' => $inn,
            'date' => $date,
            'subjectStatus' => $subjectStatus,
            'courtDealType' => $courtDealType,
            'courtName' => $courtName,
            'legalFact' => $legalFact,
            'legalFactReference' => $legalFactReference,
            'createdAt' => $createdAt,
            'documentType' => $documentType,
            'documentTypeReference' => $documentTypeReference,
            'area' => $area,
            'areaReference' => $areaReference,
        ]);
    }

    public function jsonSerialize(): array
    {
        return [
            'id' => $this->id,
            'inn' => $this->inn,
            'date' => Carbon::instance($this->date)->toDateString(),
            'subjectStatus' => $this->subjectStatus,
            'courtDealType' => $this->courtDealType,
            'courtName' => $this->courtName,
            'documentType' => $this->documentType,
            'documentTypeReference' => $this->documentTypeReference,
            'legalFact' => $this->legalFact,
            'legalFactReference' => $this->legalFactReference,
            'createdAt' => !is_null($this->createdAt) ? Carbon::instance($this->createdAt)->toDateString() : null,
            'area' => $this->area,
            'areaReference' => $this->areaReference
        ];
    }
}
