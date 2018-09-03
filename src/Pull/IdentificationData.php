<?php

namespace Wearesho\Bobra\Ubki\Pull;

use Wearesho\Bobra\Ubki\References\Language;

/**
 * Class IdentificationData
 * @package Wearesho\Bobra\Ubki\Pull
 */
class IdentificationData implements IdentificationDataInterface
{
    /** @var Language */
    protected $language;

    protected $identifiers;

    protected $documents;

    protected $contacts;

    protected $mvd;

    protected $compromisedPhone;
}
