<?php

declare(strict_types=1);

namespace Wearesho\Bobra\Ubki\Contract\Data;

use Wearesho\Bobra\Ubki;

/**
 * Interface RequestHead
 * @package Wearesho\Bobra\Ubki\Contract\Data
 */
interface RequestHead
{
    public const VERSION = 'version';
    public const TYPE = 'reqtype';
    public const REASON = 'reqreason';
    public const DATE = 'reqdate';
    public const ID = 'reqidout';
    public const INITIATOR = 'reqsource';

    public function getVersion(): string;

    public function getReason(): Ubki\Dictionary\RequestReason;

    public function getDate(): ?\DateTimeInterface;

    public function getId(): ?string;

    public function getInitiator(): ?Ubki\Dictionary\RequestInitiator;
}
