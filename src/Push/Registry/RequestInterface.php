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
    public function getTodo(): string;

    /**
     * Date of the operational day
     * format: Ymd
     *
     * @return \DateTimeInterface
     */
    public function getIndate(): \DateTimeInterface;

    /**
     * Id from UBKI request
     *
     * @return string
     */
    public function getIdout(): string;

    /**
     * Id from partner request
     *
     * @return string
     */
    public function getIdalien(): string;
}
