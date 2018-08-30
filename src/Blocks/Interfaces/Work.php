<?php

namespace Wearesho\Bobra\Ubki\Blocks\Interfaces;

use Wearesho\Bobra\Ubki\ElementInterface;
use Wearesho\Bobra\Ubki\References;

/**
 * Interface Work
 * @package Wearesho\Bobra\Ubki\Blocks\Interfaces
 */
interface Work extends ElementInterface
{
    public const TAG = 'work';
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

    public function getLanguage(): References\Language;

    public function getErgpou(): string;

    public function getName(): string;

    public function getRank(): ?References\IdentifierRank;

    public function getExperience(): ?int;

    public function getIncome(): ?float;
}
