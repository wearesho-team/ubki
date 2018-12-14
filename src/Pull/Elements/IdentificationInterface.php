<?php

namespace Wearesho\Bobra\Ubki\Pull\Elements;

use Wearesho\Bobra\Ubki;

/**
 * Interface IdentificationInterface
 * @package Wearesho\Bobra\Ubki\Pull\Elements
 */
interface IdentificationInterface extends Ubki\Infrastructure\ElementInterface
{
    public const INN = 'okpo';
    public const NAME = 'fname';
    public const PATRONYMIC = 'mname';
    public const SURNAME = 'lname';
    public const BIRTH_DATE = 'bdate';

    public function getInn(): string;

    public function getName(): ?string;

    public function getPatronymic(): ?string;

    public function getSurname(): ?string;

    public function getBirthDate(): ?\DateTimeInterface;
}
