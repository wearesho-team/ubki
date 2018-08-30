<?php

namespace Wearesho\Bobra\Ubki\Blocks\Entities;

use Wearesho\Bobra\Ubki\Blocks;

/**
 * Class CourtDecision
 * @package Wearesho\Bobra\Ubki\Blocks\Entities
 */
class CourtDecision implements Blocks\Interfaces\CourtDecision
{
    use Blocks\Traits\CourtDecision;

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
