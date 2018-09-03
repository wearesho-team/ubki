<?php

namespace Wearesho\Bobra\Ubki\Blocks\Traits;

use Carbon\Carbon;

use Wearesho\Bobra\Ubki\ElementTrait;

/**
 * Trait CourtDecision
 * @package Wearesho\Bobra\Ubki\Blocks\Traits
 */
trait CourtDecision
{
    use ElementTrait;

    /** @var string */
    protected $id;

    /** @var string */
    protected $inn;

    /** @var \DateTimeInterface */
    protected $date;

    /** @var int */
    protected $subjectStatus;

    /** @var int */
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

    public function getSubjectStatus(): int
    {
        return $this->subjectStatus;
    }

    public function getCourtDealType(): int
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
