<?php

namespace Wearesho\Bobra\Ubki\Push\Registry;

/**
 * Interface RequestInterface
 *
 * @package Wearesho\Bobra\Ubki\Push\Registry
 */
interface RequestInterface
{
    /**
     * Type of request
     *
     * @return string
     */
    public function getRegistryType(): string;

    /**
     * Date of the operational day
     * format: Ymd
     *
     * @return string
     */
    public function getOperationDate(): string;

    /**
     * Id from UBKI request
     *
     * @return string
     */
    public function getUbkiId(): string;

    /**
     * Id from partner request
     *
     * @return string
     */
    public function getPartnerId(): string;
}
