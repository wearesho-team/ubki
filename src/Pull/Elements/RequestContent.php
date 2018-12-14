<?php

namespace Wearesho\Bobra\Ubki\Pull\Elements;

use Wearesho\Bobra\Ubki;

/**
 * Class RequestContent
 * @package Wearesho\Bobra\Ubki\Pull\Elements
 */
class RequestContent extends Ubki\Infrastructure\Element implements RequestContentInterface
{
    use RequestContentTrait;

    public const TAG = 'i';

    public function __construct(
        Ubki\Dictionaries\Language $language,
        Identification $identification,
        Ubki\Pull\Collections\Contacts $contacts = null,
        Ubki\Pull\Collections\Documents $documents = null
    ) {
        $this->language = $language;
        $this->identification = $identification;
        $this->contacts = $contacts;
        $this->documents = $documents;
    }
}
