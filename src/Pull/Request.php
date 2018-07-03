<?php

namespace Wearesho\Bobra\Ubki\Pull;

use Wearesho\Bobra\Ubki;

/**
 * Class Request
 * @package Wearesho\Bobra\Ubki\Pull
 */
class Request
{
    /** @var Ubki\Language */
    protected $language;

    /** @var Reason */
    protected $reason;

    /** @var Type */
    protected $type;

    /** @var \DateTimeInterface */
    protected $date;

    /**
     * @inheritdoc
     */
    public function getLanguage(): Ubki\Language
    {
        return $this->language;
    }

    public function setLanguage(Ubki\Language $language): self
    {
        $this->language = $language;
        return $this;
    }

    /**
     * @inheritdoc
     */
    public function getReason(): Reason
    {
        return $this->reason;
    }

    public function setReason(Reason $reason): self
    {
        $this->reason = $reason;
        return $this;
    }

    /**
     * @inheritdoc
     */
    public function getType(): Type
    {
        return $this->type;
    }

    public function setType(Type $type): self
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @inheritdoc
     */
    public function getDate(): \DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;
        return $this;
    }
}
