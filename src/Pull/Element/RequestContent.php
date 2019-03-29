<?php

namespace Wearesho\Bobra\Ubki\Pull\Element;

use Wearesho\Bobra\Ubki;

/**
 * Class RequestContent
 * @package Wearesho\Bobra\Ubki\Pull\Element
 */
class RequestContent extends Ubki\Element implements RequestContentInterface
{
    use RequestContentTrait;

    public const TAG = 'i';

    public function __construct(
        Ubki\Dictionary\Language $language,
        Identification $identification,
        Ubki\Pull\Collection\Contacts $contacts = null,
        Ubki\Pull\Collection\Documents $documents = null
    ) {
        $this->language = $language;
        $this->identification = $identification;
        $this->contacts = $contacts;
        $this->documents = $documents;
    }
}
