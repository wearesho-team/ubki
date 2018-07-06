<?php

namespace Wearesho\Bobra\Ubki\Reestr\Rep;

use Wearesho\Bobra\Ubki\Reestr;

/**
 * Interface ResponseInterface
 *
 * @package Wearesho\Bobra\Ubki\Reestr\Rep
 */
interface ResponseInterface extends Reestr\ResponseInterface
{
    /**
     * Reestr type
     *
     * @return string
     */
    public function getErtype(): string;

    /**
     * Criticality of error
     * variables: 'CRITICAL', 'NOTICE' or ''
     * Always exist
     *
     * @return string
     */
    public function getCrytical(): string;

    /**
     * Unique inn code of subject
     *
     * @return int
     */
    public function getInn(): int;

    /**
     * Note text
     *
     * @return string
     */
    public function getRemark(): string;

    public function isErrorCritical(): bool;

    public function isErrorNotice(): bool;
}
