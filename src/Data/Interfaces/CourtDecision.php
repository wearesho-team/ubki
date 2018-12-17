<?php

namespace Wearesho\Bobra\Ubki\Data\Interfaces;

use Wearesho\Bobra\Ubki;

/**
 * Interface CourtDectision
 * @package Wearesho\Bobra\Ubki\Data\Interfaces
 */
interface CourtDecision extends Ubki\Infrastructure\ElementInterface
{
    public const ID = 'voteid';
    public const INN = 'inn';
    public const DATE = 'votedate';
    public const SUBJECT_STATUS = 'voteusrst';
    public const SUBJECT_STATUS_REF = 'voteusrstref';
    public const COURT_DEAL_TYPE = 'votetype';
    public const COURT_DEAL_TYPE_REF = 'votetyperef';
    public const COURT_NAME = 'votesudname';
    public const LEGAL_FACT = 'voteurfact';
    public const LEGAL_FACT_REF = 'voteurfactref';
    public const CREATED_AT = 'vdate';
    public const DOCUMENT_TYPE = 'votedoctype';
    public const DOCUMENT_TYPE_REF = 'votedoctyperef';
    public const AREA = 'votesudregion';
    public const AREA_REF = 'votesudregionref';

    public function getId(): string;

    public function getInn(): string;

    public function getDate(): \DateTimeInterface;

    public function getSubjectStatus(): Ubki\Dictionary\CourtSubjectStatus;

    public function getCourtDealType(): Ubki\Dictionary\CourtDealType;

    public function getCourtName(): string;

    public function getDocumentType(): string;

    public function getDocumentTypeReference(): string;

    public function getLegalFact(): ?string;

    public function getLegalFactReference(): ?string;

    public function getCreatedAt(): ?\DateTimeInterface;

    public function getArea(): ?string;

    public function getAreaReference(): ?string;
}
