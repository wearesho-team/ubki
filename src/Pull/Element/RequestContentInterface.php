<?php

namespace Wearesho\Bobra\Ubki\Pull\Element;

use Wearesho\Bobra\Ubki;

/**
 * Interface RequestContentInterface
 * @package Wearesho\Bobra\Ubki\Pull\Element
 */
interface RequestContentInterface extends Ubki\ElementInterface
{
    public const LANGUAGE = 'reqlng';

    public function getIdentification(): Identification;

    public function getContacts(): Ubki\Pull\Collection\Contact;

    public function getDocuments(): Ubki\Pull\Collection\Document;

    public function getLanguage(): Ubki\Dictionary\Language;
}
