<?php

namespace Wearesho\Bobra\Ubki\Data\Traits;

use Wearesho\Bobra\Ubki;

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

    /** @var Ubki\Dictionaries\CourtSubjectStatus */
    protected $subjectStatus;

    /** @var Ubki\Dictionaries\CourtDealType */
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
            Ubki\Data\Interfaces\CourtDecision::ID => $this->getId(),
            Ubki\Data\Interfaces\CourtDecision::INN => $this->getInn(),
            Ubki\Data\Interfaces\CourtDecision::DATE => $this->getDate(),
            Ubki\Data\Interfaces\CourtDecision::SUBJECT_STATUS => $this->getSubjectStatus(),
            Ubki\Data\Interfaces\CourtDecision::COURT_DEAL_TYPE => $this->getCourtDealType(),
            Ubki\Data\Interfaces\CourtDecision::COURT_NAME => $this->getCourtName(),
            Ubki\Data\Interfaces\CourtDecision::DOCUMENT_TYPE => $this->getDocumentType(),
            Ubki\Data\Interfaces\CourtDecision::DOCUMENT_TYPE_REF => $this->getDocumentTypeReference(),
            Ubki\Data\Interfaces\CourtDecision::LEGAL_FACT => $this->getLegalFact(),
            Ubki\Data\Interfaces\CourtDecision::LEGAL_FACT_REF => $this->getLegalFactReference(),
            Ubki\Data\Interfaces\CourtDecision::CREATED_AT => $this->getCreatedAt(),
            Ubki\Data\Interfaces\CourtDecision::AREA => $this->getArea(),
            Ubki\Data\Interfaces\CourtDecision::AREA_REF => $this->getAreaReference(),
        ];
    }

    public function tag(): string
    {
        return Ubki\Data\Interfaces\CourtDecision::TAG;
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

    public function getSubjectStatus(): Ubki\Dictionaries\CourtSubjectStatus
    {
        return $this->subjectStatus;
    }

    public function getCourtDealType(): Ubki\Dictionaries\CourtDealType
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
