<?php

namespace Wearesho\Bobra\Ubki\Reestr;


interface RequestInterface
{
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
    public function getIndate(): string;

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
