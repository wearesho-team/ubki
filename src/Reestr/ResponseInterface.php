<?php

namespace Wearesho\Bobra\Ubki\Reestr;

/**
 * Interface ResponseInterface
 *
 * @package Wearesho\Bobra\Ubki\Reestr
 */
interface ResponseInterface
{
    public const STATE_PROCESSED = 'r';
    public const STATE_TRANSMITTED = 'n';
    public const STATE_CREATED = 'i';
    public const STATE_BLOCKED = 'b';
    public const STATE_SQL_ERROR = 'e';

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

    /**
     * Authorization session key
     *
     * @return string
     */
    public function getSessid(): string;

    /**
     * State of sent report
     *
     * @return string
     */
    public function getState(): string;

    /**
     * Transmission operation type
     * Is specified when the request tag is passed in the reqtype attribute of the request
     *
     * @return string
     */
    public function getOper(): string;

    /**
     * Id of component
     * see specification
     *
     * @return int
     */
    public function getCompid(): int;

    /**
     * Subcomponent
     *
     * @return string
     */
    public function getItem(): string;
}
