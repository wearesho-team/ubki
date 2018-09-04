<?php

namespace Wearesho\Bobra\Ubki\Data\Interfaces;

use Wearesho\Bobra\Ubki\ElementInterface;
use Wearesho\Bobra\Ubki\References;

/**
 * Interface RequestData
 * @package Wearesho\Bobra\Ubki\Data\Interfaces
 */
interface RequestData extends ElementInterface
{
    public const TAG = 'request';
    public const VERSION = 'version';
    public const TYPE = 'reqtype';
    public const REASON = 'reqreason';
    public const DATE = 'reqdate';
    public const ID = 'reqidout';
    public const INITIATOR = 'reqsource';

    public function getVersion(): string;

    public function getType(): References\RequestType;

    public function getReason(): References\RequestReason;

    public function getDate(): ?\DateTimeInterface;

    public function getId(): ?string;

    public function getInitiator(): ?References\RequestInitiator;
}
