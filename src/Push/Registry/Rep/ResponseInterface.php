<?php

namespace Wearesho\Bobra\Ubki\Push\Registry\Rep;

use Wearesho\Bobra\Ubki\Push\Registry;

/**
 * Interface ResponseInterface
 *
 * @package Wearesho\Bobra\Ubki\Push\Registry\Rep
 */
interface ResponseInterface extends Registry\ResponseInterface
{
    public const ERROR_CRITICAL = 'CRITICAL';
    public const ERROR_NOTICE = 'NOTICE';

    /**
     * This method return type of reestr
     * @see https://docs.google.com/document/d/13pGJ_PUPP2QmETln280lTpG7Gz1M8la55tBI_hMdVic
     * (ertype attribute in REP response)
     *
     * @return string
     */
    public function getRegistryType(): string;

    /**
     * Criticality of error
     * Always exist
     *
     * @return string
     */
    public function getErrorType(): string;

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
}
