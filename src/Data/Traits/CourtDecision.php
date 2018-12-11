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
