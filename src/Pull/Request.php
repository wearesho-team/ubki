<?php

namespace Wearesho\Bobra\Ubki\Pull;

use Wearesho\Bobra\Ubki;

/**
 * Class Request
 * @package Wearesho\Bobra\Ubki\Pull
 */
class Request
{
    /** @var int */
    protected $inn;

    /** @var Ubki\Language */
    protected $language;

    /** @var Reason */
    protected $reason;

    /** @var Type */
    protected $type;

    /** @var \DateTimeInterface */
    protected $date;

    public function __construct(
        int $inn,
        Ubki\Language $language,
        Reason $reason,
        Type $type,
        \DateTimeInterface $date
    ) {
        $this->language = $language;
        $this->reason = $reason;
        $this->type;
        $this->date = $date;
    }

    public function getInn(): int
    {
        return $this->inn;
    }

    public function getLanguage(): Ubki\Language
    {
        return $this->language;
    }

    public function getReason(): Reason
    {
        return $this->reason;
    }

    public function getType(): Type
    {
        return $this->type;
    }

    public function getDate(): \DateTimeInterface
    {
        return $this->date;
    }
}
