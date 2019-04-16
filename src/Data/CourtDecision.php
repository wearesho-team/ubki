<?php

declare(strict_types=1);

namespace Wearesho\Bobra\Ubki\Data;

use Carbon\Carbon;
use Wearesho\Bobra\Ubki;

/**
 * Class CourtDecision
 * @package Wearesho\Bobra\Ubki\Data
 *
 * @method static CourtDecision make(...$arguments)
 */
class CourtDecision implements Ubki\Contract\Data\CourtDecision, \JsonSerializable
{
    use Makeable, Tagable;

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
        string $documentTypeReference = \null,
        string $legalFact = \null,
        string $legalFactReference = \null,
        \DateTimeInterface $createdAt = \null,
        string $area = \null,
        string $areaReference = \null
    ) {
        Ubki\Validator::INN()->validate($inn);
        Ubki\Validator::JUST_TEXT_100()->validate($courtName);

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

    public function jsonSerialize(): array
    {
        return [
            'id' => $this->id,
            'inn' => $this->inn,
            'date' => Carbon::make($this->date),
            'subjectStatus' => $this->subjectStatus,
            'dealType' => $this->courtDealType,
            'courtName' => $this->courtName,
            'document' => [
                'type' => $this->documentType,
                'reference' => $this->documentTypeReference,
            ],
            'legalFact' => [
                'type' => $this->legalFact,
                'reference' => $this->legalFactReference,
            ],
            'createdAt' => Carbon::make($this->createdAt),
            'area' => [
                'type' => $this->area,
                'reference' => $this->areaReference,
            ]
        ];
    }

    public static function tag(): string
    {
        return 'susd';
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
