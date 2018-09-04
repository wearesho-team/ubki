<?php

namespace Wearesho\Bobra\Ubki\Pull;

use Wearesho\Bobra\Ubki\References\Language;

/**
 * Class IdentificationData
 * @package Wearesho\Bobra\Ubki\Pull
 */
class IdentificationData
{
    /** @var Language */
    protected $language;

    /** @var string */
    protected $inn;

    /**
     * IdentificationData constructor.
     *
     * @param Language $language
     * @param string   $inn
     */
    public function __construct(Language $language, string $inn)
    {
        $this->language = $language;
        $this->inn = $inn;
    }

    public function getLanguage(): Language
    {
        return $this->language;
    }

    public function getInn(): string
    {
        return $this->inn;
    }
}
