<?php

namespace Wearesho\Bobra\Ubki\Data;

use Wearesho\Bobra\Ubki;

/**
 * Class CourtDecision
 * @package Wearesho\Bobra\Ubki\Data
 */
class CourtDecision
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

    /** @var string */
    protected $id;

    /** @var string */
    protected $inn;

    /** @var \DateTimeInterface */
    protected $date;

    /** @var Ubki\Dictionary\CourtSubject */
    protected $subjectStatus;

    /** @var Ubki\Dictionary\CourtDeal */
    protected $courtDealType;

    /** @var string */
    protected $courtName;

    /** @var string */
    protected $documentType;

    /** @var string */
    protected $documentTypeReference;

    /** @var string|null */
    protected $legalFact;

    /** @var string|null */
    protected $legalFactReference;

    /** @var \DateTimeInterface|null */
    protected $createdAt;

    /** @var string|null */
    protected $area;

    /** @var string|null */
    protected $areaReference;

    public function __construct(
        string $id,
        string $inn,
        \DateTimeInterface $date,
        Ubki\Dictionary\CourtSubject $subjectStatus,
        Ubki\Dictionary\CourtDeal $courtDealType,
        string $courtName,
        string $documentType,
        string $documentTypeReference = null,
        string $legalFact = null,
        string $legalFactReference = null,
        \DateTimeInterface $createdAt = null,
        string $area = null,
        string $areaReference = null
    ) {
        $this->id = $id;
        $this->inn = $inn;
        $this->date = $date;
        $this->subjectStatus = $subjectStatus;
        $this->courtDealType = $courtDealType;
        $this->courtName = $courtName;
        $this->documentType = $documentType;
        $this->documentTypeReference = $documentTypeReference;
        $this->legalFact = $legalFact;
        $this->legalFactReference = $legalFactReference;
        $this->createdAt = $createdAt;
        $this->area = $area;
        $this->areaReference = $areaReference;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getInn(): string
    {
        return $this->inn;
    }

    public function getDate(): \DateTimeInterface
    {
        return $this->date;
    }

    public function getSubjectStatus(): Ubki\Dictionary\CourtSubject
    {
        return $this->subjectStatus;
    }

    public function getCourtDealType(): Ubki\Dictionary\CourtDeal
    {
        return $this->courtDealType;
    }

    public function getCourtName(): string
    {
        return $this->courtName;
    }

    public function getDocumentType(): string
    {
        return $this->documentType;
    }

    public function getDocumentTypeReference(): string
    {
        return $this->documentTypeReference;
    }

    public function getLegalFact(): ?string
    {
        return $this->legalFact;
    }

    public function getLegalFactReference(): ?string
    {
        return $this->legalFactReference;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function getArea(): ?string
    {
        return $this->area;
    }

    public function getAreaReference(): ?string
    {
        return $this->areaReference;
    }
}
