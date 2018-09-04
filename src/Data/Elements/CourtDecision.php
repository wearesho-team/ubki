<?php

namespace Wearesho\Bobra\Ubki\Data\Elements;

use Wearesho\Bobra\Ubki\Data;

/**
 * Class CourtDecision
 * @package Wearesho\Bobra\Ubki\Data\Elements
 */
class CourtDecision implements Data\Interfaces\CourtDecision
{
    use Data\Traits\CourtDecision;

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
        $this->documentType = $documentType;
        $this->documentTypeReference = $documentTypeReference;
        $this->legalFact = $legalFact;
        $this->legalFactReference = $legalFactReference;
        $this->createdAt = $createdAt;
        $this->area = $area;
        $this->areaReference = $areaReference;
    }
}
