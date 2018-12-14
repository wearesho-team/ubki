<?php

namespace Wearesho\Bobra\Ubki\Pull\Elements;

use Wearesho\Bobra\Ubki;

/**
 * Interface RequestContentInterface
 * @package Wearesho\Bobra\Ubki\Pull\Elements
 */
interface RequestContentInterface extends Ubki\Infrastructure\ElementInterface
{
    public const LANGUAGE = 'reqlng';

    public function getIdentification(): Identification;

    public function getContacts(): ?Ubki\Pull\Collections\Contacts;

    public function getDocuments(): ?Ubki\Pull\Collections\Documents;

    public function getLanguage(): Ubki\Dictionaries\Language;
}
