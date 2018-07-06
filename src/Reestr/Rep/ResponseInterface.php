<?php

namespace Wearesho\Bobra\Ubki\Reestr\Rep;

use Wearesho\Bobra\Ubki\Reestr;

/**
 * Interface ResponseInterface
 * All attributes in response from UBKI REESTR is exist
 *
 * @package Wearesho\Bobra\Ubki\Reestr\Rep
 */
interface ResponseInterface extends Reestr\ResponseInterface
{
    /**
     * This method return type of reestr
     * @see https://docs.google.com/document/d/13pGJ_PUPP2QmETln280lTpG7Gz1M8la55tBI_hMdVic (ertype attribute in REP response)
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
