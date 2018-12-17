<?php

namespace Wearesho\Bobra\Ubki\Pull\Element;

use Wearesho\Bobra\Ubki;

/**
 * Interface RequestContentInterface
 * @package Wearesho\Bobra\Ubki\Pull\Element
 */
interface RequestContentInterface extends Ubki\Infrastructure\ElementInterface
{
    public const LANGUAGE = 'reqlng';

    public function getIdentification(): Identification;

    public function getContacts(): ?Ubki\Pull\Collection\Contacts;

    public function getDocuments(): ?Ubki\Pull\Collection\Documents;

    public function getLanguage(): Ubki\Dictionary\Language;
}
