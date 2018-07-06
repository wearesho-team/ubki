<?php

namespace Wearesho\Bobra\Ubki\Reestr;


interface RequestInterface
{
    const TYPE_BIL = 'BIL';
    const TYPE_REP = 'REP';

    /**
     * Type of request (BIL|REP)
     *
     * @return string
     */
    public function getTodo(): string;

    /**
     * Date of the operational day
     * format: Ymd
     *
     * @return string
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
