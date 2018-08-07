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

    /** @var string */
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
