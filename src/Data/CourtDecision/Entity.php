<?php

namespace Wearesho\Bobra\Ubki\Data\CourtDecision;

use Wearesho\Bobra\Ubki\Element;

/**
 * Class Entity
 * @package Wearesho\Bobra\Ubki\Data\CourtDecision
 */
class Entity extends Element
{
    public const TAG = 'susd';

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

    /** @var string|null */
    protected $legalFact;

    /** @var string|null */
    protected $legalFactReference;

    /** @var \DateTimeInterface|null */
    protected $createdAt;

    /** @var string */
    protected $documentType;

    /** @var string  */
    protected $documentTypeReference;

    /** @var string|null */
    protected $area;

    /** @var string|null */
    protected $areaReference;

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
        $this->id = $id;
        $this->inn = $inn;
        $this->date = $date;
        $this->subjectStatus = $subjectStatus;
        $this->courtDealType = $courtDealType;
        $this->courtName = $courtName;
        $this->legalFact = $legalFact;
        $this->legalFactReference = $legalFactReference;
        $this->createdAt = $createdAt;
        $this->documentType = $documentType;
        $this->documentTypeReference = $documentTypeReference;
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

    public function getDocumentType(): string
    {
        return $this->documentType;
    }

    public function getDocumentTypeReference(): string
    {
        return $this->documentTypeReference;
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
