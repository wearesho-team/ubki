<?php

namespace Wearesho\Bobra\Ubki\Data\Traits;

use Wearesho\Bobra\Ubki\Data\Interfaces;
use Wearesho\Bobra\Ubki\Dictionaries;

/**
 * Trait CourtDecision
 * @package Wearesho\Bobra\Ubki\Data\Traits
 */
trait CourtDecision
{
    /** @var string */
    protected $id;

    /** @var string */
    protected $inn;

    /** @var \DateTimeInterface */
    protected $date;

    /** @var Dictionaries\CourtSubjectStatus */
    protected $subjectStatus;

    /** @var Dictionaries\CourtDealType */
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

    public function jsonSerialize(): array
    {
        return [
            Interfaces\CourtDecision::ID => $this->id,
            Interfaces\CourtDecision::INN => $this->inn,
            Interfaces\CourtDecision::DATE => $this->date,
            Interfaces\CourtDecision::SUBJECT_STATUS => $this->subjectStatus,
            Interfaces\CourtDecision::COURT_DEAL_TYPE => $this->courtDealType,
            Interfaces\CourtDecision::COURT_NAME => $this->courtName,
            Interfaces\CourtDecision::DOCUMENT_TYPE => $this->documentType,
            Interfaces\CourtDecision::DOCUMENT_TYPE_REF => $this->documentTypeReference,
            Interfaces\CourtDecision::LEGAL_FACT => $this->legalFact,
            Interfaces\CourtDecision::LEGAL_FACT_REF => $this->legalFactReference,
            Interfaces\CourtDecision::CREATED_AT => $this->createdAt,
            Interfaces\CourtDecision::AREA => $this->area,
            Interfaces\CourtDecision::AREA_REF => $this->areaReference,
        ];
    }

    public function tag(): string
    {
        return Interfaces\CourtDecision::TAG;
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

    public function getSubjectStatus(): Dictionaries\CourtSubjectStatus
    {
        return $this->subjectStatus;
    }

    public function getCourtDealType(): Dictionaries\CourtDealType
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
