<?php

namespace Wearesho\Bobra\Ubki\Data\Element;

use Wearesho\Bobra\Ubki;

/**
 * Class CourtDecision
 * @package Wearesho\Bobra\Ubki\Data\Element
 */
class CourtDecision extends Ubki\Infrastructure\Element implements Ubki\Data\Interfaces\CourtDecision
{
    use Ubki\Data\Traits\CourtDecision;

    public const TAG = 'susd';

    public function __construct(
        string $id,
        string $inn,
        \DateTimeInterface $date,
        Ubki\Dictionary\CourtSubjectStatus $subjectStatus,
        Ubki\Dictionary\CourtDealType $courtDealType,
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
}
