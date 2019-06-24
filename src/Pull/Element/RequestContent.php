<?php

declare(strict_types=1);

namespace Wearesho\Bobra\Ubki\Pull\Element;

use Wearesho\Bobra\Ubki;

/**
 * Class RequestContent
 * @package Wearesho\Bobra\Ubki\Pull\Element
 */
class RequestContent implements RequestContentInterface
{
    use RequestContentTrait;

    public const TAG = 'i';

    public function __construct(
        Ubki\Dictionary\Language $language,
        Identification $identification,
        Ubki\Pull\Collection\Contact $contacts,
        Ubki\Pull\Collection\Document $documents
    ) {
        $this->language = $language;
        $this->identification = $identification;
        $this->contacts = $contacts;
        $this->documents = $documents;
    }
}
