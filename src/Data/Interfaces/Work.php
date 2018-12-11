<?php

namespace Wearesho\Bobra\Ubki\Data\Interfaces;

use Wearesho\Bobra\Ubki;

/**
 * Interface Work
 * @package Wearesho\Bobra\Ubki\Data\Interfaces
 */
interface Work extends Ubki\Infrastructure\ElementInterface
{
    public const CREATED_AT = 'vdate';
    public const LANGUAGE = 'lng';
    public const LANGUAGE_REF = 'lngref';
    public const RANK = 'cdolgn';
    public const RANK_REF = 'cdolgnref';
    public const ERGPOU = 'wokpo';
    public const NAME = 'wname';
    public const EXPERIENCE = 'wstag';
    public const INCOME = 'wdohod';

    public function getCreatedAt(): \DateTimeInterface;

    public function getLanguage(): Ubki\Dictionaries\Language;

    public function getErgpou(): string;

    public function getName(): string;

    public function getRank(): ?Ubki\Dictionaries\IdentifierRank;

    public function getExperience(): ?int;

    public function getIncome(): ?float;
}
