<?php

namespace Wearesho\Bobra\Ubki\Data\Interfaces;

use Wearesho\Bobra\Ubki;

/**
 * Interface RequestData
 * @package Wearesho\Bobra\Ubki\Data\Interfaces
 */
interface RequestData extends Ubki\Infrastructure\ElementInterface
{
    public const VERSION = 'version';
    public const TYPE = 'reqtype';
    public const REASON = 'reqreason';
    public const DATE = 'reqdate';
    public const ID = 'reqidout';
    public const INITIATOR = 'reqsource';

    public function getType(): Ubki\Dictionaries\RequestType;

    public function getReason(): Ubki\Dictionaries\RequestReason;

    public function getDate(): ?\DateTimeInterface;

    public function getId(): ?string;

    public function getInitiator(): ?Ubki\Dictionaries\RequestInitiator;
}
