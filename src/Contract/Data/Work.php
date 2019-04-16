<?php

declare(strict_types=1);

namespace Wearesho\Bobra\Ubki\Contract\Data;

use Wearesho\Bobra\Ubki;

/**
 * Interface Work
 * @package Wearesho\Bobra\Ubki\Contract\Data
 */
interface Work
{
    public const CREATED_AT = 'vdate';
    public const LANGUAGE = 'lng';
    public const LANGUAGE_REF = 'lngref';
    public const RANK = 'cdolgn';
    public const RANK_REF = 'cdolgnref';
    public const EGRPOU = 'wokpo';
    public const NAME = 'wname';
    public const EXPERIENCE = 'wstag';
    public const INCOME = 'wdohod';

    public function getCreatedAt(): \DateTimeInterface;

    public function getLanguage(): Ubki\Dictionary\Language;

    public function getEgrpou(): string;

    public function getName(): string;

    public function getRank(): ?Ubki\Dictionary\IdentifierRank;

    public function getExperience(): ?int;

    public function getIncome(): ?float;
}
